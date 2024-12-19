<?php

use Illuminate\Support\Facades\Route;
use App\Models\Role;
use App\Http\Controllers\Account;
use App\Http\Controllers\Dashboard;

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

##Route::get('/', function () {
##   // return view('welcome');
##    return view('admin/index');
##});

Route::get('/', function () {
   // return view('welcome');
    return view('account/signin');
});


Route::get('/signin', function () {
   // return view('welcome');
    return view('account/signin');
});
Route::post('/auth',[Account::class,'auth']);



Route::get('/logout',function(){
   Auth::logout();
   return redirect ('/signin');
});








#Route::get('/dashboard',[Dashboard::class,'index']);




Route::get('/register_admin',[Account::class,'register_admin']);
Route::get('/register_customer',[Account::class,'register_customer']);
