<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmerController extends Controller
{
    //

    public function create_farmer(){
        return view('pages.admin.create_farmer');
    }



    public function create_farmer_action(Request $request){

        $validate = $request->validate([
            'name' => 'required|max:8',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);


        $data = $request->only('name', 'email', 'password');

        $data['password'] = Hash::make($data['password']);

        User::create($data);


        return redirect(route('admin.home'));



    }


    public function edit_farmer_action(Request $request){

          $request->validate([
            
            'name' => 'nullable|max:8',
            'password' => 'nullable|min:6'
            
           
        ]); 

        if($request->name){
            $data['name'] = $request->name;
        }

        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        if(isset($data)){
            User::where("id","=",$request['id'])->update($data);
        }

       
     return redirect(route('admin.home'));
        

    }


    public function delete_farmer_action(Request $request){

      

        User::where("id","=",$request['id'])->delete();

        return redirect(route('admin.home'));

    }
}
