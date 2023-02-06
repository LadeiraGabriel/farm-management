<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\UploadFile;

use App\Models\Cow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CowController extends Controller
{



    public function index(){

        $is_admin = Auth::user()->is_admin;
       $cows =  Cow::all();
        $farmers = User::where('is_admin','=','0')->get();

        if(isset($cows)){
            return view('pages.admin.gallery_cows',['cows' => $cows,'farmers' => $farmers ,'is_admin' => $is_admin]) ;
        }
        return view('pages.admin.gallery_cows') ;

        
    }

    
    public function create_cow(){


      $is_admin =  Auth::user()->is_admin;

      $users = User::where('is_admin',"=","0")->get();
        return view('pages.admin.create_cow',['is_admin' => $is_admin, 'farmers' => $users]);
    }

    public function create_cow_action(Request $request){
       
         
       

        $validate = $request->validate([
            'name' => 'required|max:8',
            'age' => 'required',
            'weight' => 'required',
            'user_id' => 'required',
            'image' => 'required|mimes:jpg,png,svg'

        ]);


        $data = $request->only([
            'name','age','weight','user_id', 
        ]);

        if(!isset($request->vaccinated)){
            $data['is_vaccinated'] = 0;
        }else{
            $data['is_vaccinated'] = 1;
        }
        

        $extension = $request->image->extension();

       $imageName  = md5($request->image->getClientOriginalName() . strtotime("now")) . "." . $extension;

       $request->image->move(public_path('assets/images/cows'),$imageName);
        

        $data['image_path'] = $imageName;

        $newCow =  Cow::create($data);

        return redirect(route('admin.cows')); 


}


        public function edit_cow_action( Request $request){

    
            $validate = $request->validate([
                'id' => 'required',
                'name' => 'max:8',
                'age' => 'max:3',
                'weight' => 'max:5',
                'user_id' => 'string',
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

            if($request->user_id){
                $data['user_id'] = $request->user_id;
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
           

           return redirect(route('admin.cows'));
        }



        
        public function delete_cow_action(Request $request){

             $cow = Cow::find($request->id); 

          $imageCow =  public_path().'/assets/images/cows/'. $cow->image_path;
           unlink($imageCow);


           $cow->delete();
            
          
            return redirect(route('admin.cows')); 
    
        }
        


}