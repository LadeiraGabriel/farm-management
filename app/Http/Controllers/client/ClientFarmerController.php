<?php

namespace App\Http\Controllers\client;

use App\Models\Cow;
use App\Models\User;
use Illuminate\Hashing\HashManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientFarmerController extends Controller
{
    


    public function index(){



        $user = Auth::user();

      
        return view('pages.client.account_farmer',['is_admin' => $user->is_admin,'user' => $user]);
    }


    public function change_password_action(Request $request){

        $validate = $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        

         User::where('id','=',Auth::user()->id)->update([
            'password' => Hash::make($request->password)
         ]);  

         return redirect(route('client.cows'));

    }




    



 
}
