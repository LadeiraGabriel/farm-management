<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CowController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\FarmerController;
use App\Http\Controllers\client\AuthClientController;
use App\Http\Controllers\client\ClienteCowController;
use App\Http\Controllers\client\ClientFarmerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



 Route::get('/',[AuthClientController::class,'login'])->name('login_farmer');
Route::post('/login',[AuthClientController::class,'loginAction'])->name('login_action_farmer');


 Route::middleware(['farmer'])->group(function(){


  Route::get('/account',[ClientFarmerController::class,'index'])->name('client.account_farmer');

  Route::post('account',[ClientFarmerController::class,'change_password_action'])->name('client.change_password_action');

  Route::get('/cows',[ClienteCowController::class,'index'])->name('client.cows');

  Route::get('/new-cow',[ClienteCowController::class,'create_new_cow'])->name('client.new_cow');
  Route::post('/new-cow',[ClienteCowController::class,'storeNewCow'])->name('client.new_cow_action');

  Route::put('/edit-cow',[ClienteCowController::class, 'edit_cow_action'])->name('client.edit_cows_action');

  Route::get('/delete-cow/{id}',[ClienteCowController::class, 'delete_cow_action'])->name('client.delete_cows_action');

  Route::get('/logout',[AuthClientController::class,'logout'])->name('client.logout');

}); 
 







Route::get('/admin/login', [AuthController::class,'login'])->name('admin.login');

Route::post('/admin/login-action', [AuthController::class,'loginAction'])->name('loginAction');


 Route::middleware(['admin'])->prefix('admin')->group(function(){

  Route::get('/',[HomeController::class,'index'])->name('admin.home');

  Route::get('/new-farmer',[FarmerController::class, 'create_farmer'])->name('admin.new_farmer');
  Route::post('/new-farmer',[FarmerController::class, 'create_farmer_action'])->name('admin.new_farmer_action');
  
  Route::post('/edit-farmer',[FarmerController::class, 'edit_farmer_action'])->name('admin.edit_farmer_action');

  Route::get('/delete-farmer/{id}',[FarmerController::class,'delete_farmer_action'])->name('admin.delete_farmer_action');


  Route::get('/cows',[CowController::class, 'index'])->name('admin.cows');
  Route::get('/new-cow',[CowController::class, 'create_cow'])->name('admin.new_cow');
  Route::post('/new-cow',[CowController::class, 'create_cow_action'])->name('admin.new_cow_action');
  Route::put('/edit-cow',[CowController::class, 'edit_cow_action'])->name('admin.edit_cows_action');
  Route::get('/delete-cow/{id}',[CowController::class,'delete_cow_action'])->name('delete_cow_action');

  Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');


});






//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
