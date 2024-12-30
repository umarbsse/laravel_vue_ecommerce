<?php

use App\Http\Controllers\Admin\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/dashboard', function () {
    return view('admin/dashboard/index');
});

##Route::get('/profile_settting', function () {
##    return view('admin/profile/setting');
##});
Route::get('/profile_settting', [Profile::class,'profile_settting']);
Route::get('/change_pswd', function () {
    return view('admin/profile/change_pswd.blade.php');
});


