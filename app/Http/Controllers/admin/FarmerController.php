<?php

namespace App\Http\Controllers\admin;

use App\Models\Cow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmerController extends Controller
{
    //

    public function create_farmer()
    {
        return view('pages.admin.create_farmer');
    }



    public function create_farmer_action(Request $request)
    {

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



    public function edit_farmer(Request $request)
    {
        $id =  $request->id;

        $user = User::find($id);
        $cows = Cow::all();
        $listCows = [];

        if(count($user->cows_group) == 0){
            $listCows = $cows;
        }else{

            foreach($user->cows_group as $cow_user){
                $listId[] = $cow_user->id; 
            }
    
            $listCows = Cow::whereNotIn('id',$listId)->get();
        }

        

      

        $data = [
            'cows_not_from_user' => $listCows,
            'user' => $user
        ];

        return view('pages.admin.edit_farmer', $data); 

      

    }








    public function add_user_cow(Request $request)
    {
        $user_id =  $request->user_id;
        $cow_id =  $request->cow_id;

        $user = User::find($user_id);


        $user->cows_group()->attach($cow_id);


        $cows = Cow::all();
        $listCows  = [];

        if (count($user->cows_group) != 0) {

            foreach ($user->cows_group as $cow_user) {
                $cow = Cow::where("id", "!=", $cow_user->id)->get();

                $listCows[] = $cow;
            }
        } else {
            $listCows = $cows;
        }



        $data = [
            'cows_not_from_user' => $listCows,
            'cows_from_user' => $user->cows_group
        ];


        return $data;
    }



    public function remove_user_cow(Request $request)
    {
        $user_id =  $request->user_id;
        $cow_id =  $request->cow_id;

        $user = User::find($user_id);


        $user->cows_group()->detach($cow_id);


       

        return  $user->cows_group;
    }


    public function edit_farmer_action(Request $request)
    {

        $request->validate([

            'name' => 'nullable|max:8',
            'password' => 'nullable|min:6'


        ]);

        if ($request->name) {
            $data['name'] = $request->name;
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if (isset($data)) {
            User::where("id", "=", $request['id'])->update($data);
        }


        return redirect(route('admin.home'));

        
    }


    public function delete_farmer_action(Request $request)
    {

        $id  =  $request->id;

        $user = User::find($id);

        if(isset($user)){
            foreach($user->cows_group as $cow_related){
                $user->cows_group()->detach($cow_related->id);
            }
    
    
            $user->delete();
        }

       

        return redirect(route('admin.home'));
    }
}
