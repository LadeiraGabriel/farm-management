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

    public function select_cow(Request $request ){


        if(isset($request->id)){
            $cow = Cow::find($request->id);
            $cow['users'] = $cow->users;
            return $cow;
        }else{
            return false;
        }

    }

    
    public function create_cow(){


      $is_admin =  Auth::user()->is_admin;

      $users = User::where('is_admin',"=","0")->get();
        return view('pages.admin.create_cow',['is_admin' => $is_admin, 'farmers' => $users]);
    }

    public function create_cow_action(Request $request){
       
         //return $request->other_owners;
       

         $validate = $request->validate([
            'name' => 'required|max:15',
            'age' => 'required',
            'weight' => 'required',
            'user_id' => 'required',
            'image' => 'required|mimes:jpg,png,svg',
            'other_owners' => 'array'

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


        if(isset($request->other_owners) && $request->other_owners != $request->user_id ){
            foreach($request->other_owners as $owner){
                $farmer = User::find($owner);

                $farmer->cows_group()->attach($newCow->id);

            } 
        }

        return redirect(route('admin.cows')); 


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

           


           

            return view('pages.admin.edit_cow',$data);
        }


        public function edit_cow_action( Request $request){

    
            $validate = $request->validate([
                'id' => 'required',
                'name' => 'max:15|nullable',
                'age' => 'max:3|nullable',
                'weight' => 'max:5|nullable',
                
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

           /*  if($request->user_id){
                $data['user_id'] = $request->user_id;
            } */
    
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


        public function remove_cow_user(Request $request){


         $user_id =  $request->user_id;
        $cow_id =  $request->cow_id;

        $cow = Cow::find($cow_id);


        $cow->users()->detach($user_id);


        return $cow->users;

        }


        
        public function delete_cow_action(Request $request){

             $cow = Cow::find($request->id); 

           $users_related =  $cow->users;

           foreach($users_related as $user){

                $cow->users()->detach($user->id);

           }




          $imageCow =  public_path().'/assets/images/cows/'. $cow->image_path;
           unlink($imageCow);


           $cow->delete();
            
          
            return redirect(route('admin.cows')); 
    
        }
        


}