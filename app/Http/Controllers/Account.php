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
    public function register_customer()
    {
      $user         =  new User();
      $user->name   =  'Customer';
      $user->email   =  'customer@gmail.com';
      $user->password = Hash::make('customer');
      $user->save();
      $admin = Role::where('slug','customer')->first();
      $user->roles()->attach($admin);
    }
    public function auth(Request $request)
    {
      $validation = validator::make($request->all(),[
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required'],
      ]);

      if($validation->fails()){
        #return response()->json(['status'=>401,'message'=>$validation->errors()->first()]);
        return response()->json(['status'=>401,'message'=>'Invalid Credentials']);
      }else{
        $creds = array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($creds,false)){
          if(Auth::User()->hasRole('admin')){
            return response()->json(['status'=>200,'message'=>'Admin User','url'=>'admin/dashboard']);
          }else if(Auth::User()->hasRole('customer')){
            return response()->json(['status'=>200,'message'=>'Customer User','url'=>'customer/dashboard']);
          }else{
            return response()->json(['status'=>401,'message'=>'Non User']);
          }
        }else{
          return response()->json(['status'=>401 ,'message'=>'Invalid Credentials']);
        }
      }
    }
    public function auth_self_method(Request $request)
    {

      $credentials = $request->validate([
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {
        if(Auth::User()->hasRole('admin')){
          return response()->json(['status'=>200,'message'=>'Admin User','url'=>'admin/dashboard'],200);
        }else if(Auth::User()->hasRole('customer')){
          return response()->json(['status'=>200,'message'=>'customer User'],200);
        }else{
          die("asdfasdf");
        }
      }else{
        return response()->json(['status'=>404,'message'=>'Invalid creds'],404);
      }
    }
    public function auth_with_redirect(Request $request)
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
