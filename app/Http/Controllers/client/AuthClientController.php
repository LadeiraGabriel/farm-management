<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthClientController extends Controller
{
    public function index(){


        return view('pages.client.gallery_cows');
    }



    public function login(){

        if(Auth::check()){
            return redirect(route('client.my_cows'));
        }else{  
            return view('pages.client.login');
        }


       
    }


    public function loginAction(Request $request){

        $userRequest = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

      


        if (Auth::attempt($userRequest)) {
            return redirect(route('client.my_cows'));
        }else{
            return redirect(route('login_farmer'));
        }
        
        ;


    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('login_farmer'));
    }

}
