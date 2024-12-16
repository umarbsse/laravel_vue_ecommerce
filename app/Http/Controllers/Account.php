<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Hash;
use Auth;
use Validator;
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
    public function auth(Request $request)
    {

      $credentials = $request->validate([
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {
          $request->session()->regenerate();
          return redirect()->intended('/dashboard');
      }
      return back()->withErrors([
          'email' => 'Authentication failed.',])->onlyInput('email');
    }
}
