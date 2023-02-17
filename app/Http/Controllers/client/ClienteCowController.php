<?php

namespace App\Http\Controllers\client;

use App\Models\Cow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteCowController extends Controller
{
    
    public function index(){

        $user = Auth::user();


        $data = [
            'cows_raised' => $user->cows,
            'cows' => $user->cows_group,
            'user' => $user
        ];
       
        return view('pages.client.gallery_user_vacation',$data);
    }


    public function cows(){
        $user = Auth::user();
        $cows = Cow::all();

       
        //return view('pages.client.gallery_cows',['cows' => $cows,'user' => $user]);


        $listCows = [];

        if(count($user->cows_group) == 0){
            $listCows = $cows;
        }else{

            foreach($user->cows_group as $cow_user){
                $listId[] = $cow_user->id; 
            }

            foreach($user->cows as $cow_solo){
                $listId[] = $cow_solo->id; 
            }
    
            $listCows = Cow::whereNotIn('id',$listId)->get();
        }

        

      

        $data = [
            'cows_not_from_user' => $listCows,
            'user' => $user
        ];

        return view('pages.client.gallery_cows',$data);
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

        return redirect(route('client.my_cows'));
        
    }



    public function edit_cow(Request $request){



       


        $id =  $request->id;

        $cow = Cow::find($id); // virar cow
        $users = User::where("is_admin","=",0)->where('id',"<>",$cow->user->id)->get(); // buscar usuarios
        $listCows = [];  

        if(count($cow->users) == 0){ // cow usando a relação de users
            $listCows = $users;
        }else{

            foreach($cow->users as $user){
                $listId[] = $user->id; 
            }

           
    
            $listCows = User::where("is_admin",0)->where('id',"<>",$cow->user->id)->whereNotIn('id',$listId)->get();
        }

        

      

        $data = [
            'users_not_has_cow' => $listCows,
            'cow' => $cow
        ];

        return view('pages.client.edit_cow', $data); 


       










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

       foreach($cow->users as $user_related){
            $cow->users()->detach($user_related->id);
       }    



       /*  foreach($cowsUser as $cowUser){
            if($cowUser->id == $cow->id){ */
                $imageCow =  public_path().'/assets/images/cows/'. $cow->image_path;
                unlink($imageCow);
                $cow->delete();
            /* } 

        }*/

     
       return redirect(route('client.my_cows')); 

   }

}
