<?php

namespace App\Http\Controllers\client;

use App\Models\Cow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteCowController extends Controller
{
    
    public function index(){

        $user = Auth::user();

       
        return view('pages.client.gallery_cows',['cows' => $user->cows,'is_admin' => $user->is_admin]);
    }


    public function create_new_cow(){

        $user = Auth::user();
        return view('pages.client.create_cow',['is_admin' => $user->is_admin]);
    }

    public function storeNewCow(Request $request){


        $vaccinated = $request->only([
            "vaccinated",
            
        ]);

        $validate = $request->validate([
            'name' => 'required|max:8',
            'age' => 'required|numeric',
            'weight' => 'required|numeric',
            'image' => 'required|mimes:jpg,png,svg'

        ]);


        $data = $request->only([
            'name','age','weight', 
        ]);

        if($vaccinated['vaccinated']){
            $data['is_vaccinated'] = 0;
        }
        $data['is_vaccinated'] = 1; 

        $extension = $request->image->extension();

       $imageName  = md5($request->image->getClientOriginalName() . strtotime("now")) . "." . $extension;

       $request->image->move(public_path('assets/images/cows'),$imageName);
        
        $data['user_id'] = Auth::user()->id;

        $data['image_path'] = $imageName;

        $newCow =  Cow::create($data);

        return redirect(route('client.cows'));
        
    }


    public function edit_cow_action(Request $request){

        $data['user_id'] = Auth::user()->id;

        $validate = $request->validate([
            'id' => 'required',
            'name' => 'max:8',
            'age' => 'max:3',
            'weight' => 'max:5',
            'image' => 'mimes:jpg,png,svg'

        ]);  


      

        if(isset($request->name)){
            $data['name'] = $request->name;
        }

        if(isset($request->age)){
            $data['age'] = $request->age;
        }

        if(isset($request->weight)){
            $data['weight'] = $request->weight;
        }

       

        if(!isset($request->vaccinated)){
            $data['is_vaccinated'] = 0;
        }else{
            $data['is_vaccinated'] = 1;
        }

        if($request->image){
            $extension = $request->image->extension();
            $imageName  = md5($request->image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('assets/images/cows'),$imageName);
            $data['image_path'] = $imageName;
        }
      
        if(isset($data)){
            Cow::where('id','=',$request->id)->update($data);
        }
       

       return redirect(route('client.cows'));
    }


    public function delete_cow_action(Request $request){

        $user = Auth::user();
        $cowsUser = $user->cows;
        $cow = Cow::find($request->id);
        foreach($cowsUser as $cowUser){
            if($cowUser->id == $cow->id){
                $imageCow =  public_path().'/assets/images/cows/'. $cow->image_path;
                unlink($imageCow);
                $cow->delete();
            }
        }

     
       return redirect(route('client.cows')); 

   }

}
