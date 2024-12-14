<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Hash;
use Auth;
class Account extends Controller
{
    //
    public function register_admin()
    {
      $user         =  new User();
      $user->name   =  'Admin';
      $user->email   =  'admin@gmail.com';
      $user->password = Hash::make('admin');
      $user->save();
      $admin = Role::where('slug','admin')->first();
      $user->roles()->attach($admin);
    }
}
