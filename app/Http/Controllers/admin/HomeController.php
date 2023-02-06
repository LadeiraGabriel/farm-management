<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $users = User::where('is_admin',"=","0")->get();

     

        return view('pages.admin.dashboard',['users' => $users, 'is_admin' => Auth::user()->is_admin]);
    }

   

}
