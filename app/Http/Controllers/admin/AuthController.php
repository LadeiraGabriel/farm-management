<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        //


        if (isset(Auth::user()->is_admin) && Auth::user()->is_admin) {

            return redirect(route('admin.home'));
        } else {
            return  view('pages.admin.login');
        }
    }


    public function loginAction(Request $request)
    {

        $userRequest = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);




        if (Auth::attempt($userRequest, $request->remember)) {
            return redirect(route('admin.home'));
        } else {
            return redirect(route('login_farmer'));
        };
    }


    public function index()
    {
        return Auth::user();
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('login_farmer'));
    }
}
