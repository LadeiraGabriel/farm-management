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



Route::get('/', [AuthClientController::class, 'login'])->name('login_farmer');
Route::post('/login', [AuthClientController::class, 'loginAction'])->name('login_action_farmer');


Route::middleware(['farmer'])->group(function () {


  Route::get('/account', [ClientFarmerController::class, 'index'])->name('client.account_farmer');

  Route::post('account', [ClientFarmerController::class, 'change_password_action'])->name('client.change_password_action');

  Route::get('/my-cows', [ClienteCowController::class, 'index'])->name('client.my_cows');
  Route::get('/cows', [ClienteCowController::class, 'cows'])->name('client.cows');

  Route::get('/new-cow', [ClienteCowController::class, 'create_new_cow'])->name('client.new_cow');
  Route::post('/new-cow', [ClienteCowController::class, 'storeNewCow'])->name('client.new_cow_action');

  Route::post('/add-user-cow',[FarmerController::class,'add_user_cow'])->name('client.add_user_cow');
  Route::post('/remove-user-cow',[FarmerController::class,'remove_user_cow'])->name('client.remove_user_cow');

  Route::get('/edit-cow/{id}',[ClienteCowController::class,'edit_cow'])->name('client.edit_cow');

  Route::post('/edit-cow', [ClienteCowController::class, 'edit_cow_action'])->name('client.edit_cows_action');

 

  Route::get('/delete-cow/{id}', [ClienteCowController::class, 'delete_cow_action'])->name('client.delete_cows_action');

  Route::get('/logout', [AuthClientController::class, 'logout'])->name('client.logout');
});








Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::post('/admin/login-action', [AuthController::class, 'loginAction'])->name('loginAction');


Route::middleware(['admin'])->prefix('admin')->group(function () {

  Route::get('/', [HomeController::class, 'index'])->name('admin.home');

  Route::get('/new-farmer', [FarmerController::class, 'create_farmer'])->name('admin.new_farmer');
  Route::post('/new-farmer', [FarmerController::class, 'create_farmer_action'])->name('admin.new_farmer_action');

  Route::get('/edit-farmer/{id}', [FarmerController::class, 'edit_farmer'])->name('admin.edit_farmer');
  
  Route::post('/edit-farmer', [FarmerController::class, 'edit_farmer_action'])->name('admin.edit_farmer_action');

  Route::get('/delete-farmer/{id}', [FarmerController::class, 'delete_farmer_action'])->name('admin.delete_farmer_action');


  Route::get('/cows', [CowController::class, 'index'])->name('admin.cows');

  Route::post('/add-user-cow',[FarmerController::class,'add_user_cow'])->name('add_user_cow');
  Route::post('/remove-user-cow',[FarmerController::class,'remove_user_cow'])->name('remove_user_cow');

  Route::get('/cows/{id}', [CowController::class, 'select_cow'])->name('admin.select_cow');
  Route::get('/new-cow', [CowController::class, 'create_cow'])->name('admin.new_cow');
  Route::post('/new-cow', [CowController::class, 'create_cow_action'])->name('admin.new_cow_action');
  Route::get('/edit-cow/{id}',[CowController::class,'edit_cow'])->name('admin.edit_cow');
  Route::post('/edit-cow', [CowController::class, 'edit_cow_action'])->name('admin.edit_cows_action');

  Route::post('/remove-cow-user',[CowController::class,'remove_cow_user'])->name('remove_cow_user');

  
 
  Route::get('/delete-cow/{id}', [CowController::class, 'delete_cow_action'])->name('admin.delete_cow_action');

  Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});







