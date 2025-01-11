<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Validator;
use Auth;

class Profile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_settting()
    {
        //
        $data['title'] = 'Profile Setting';
        return view('admin.profile.setting', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //print_r($request->all());
        $validation = Validator::make($request->all(), [
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users,email,'.Auth::User()->id,
            'image'=>'mimes:jpeg,png,jpg,gif|max:5120', // Max 5 MB
            'address'=>'required|string|max:255',
        ]);
        if($validation->fails()){
            return response()->json(
                [
                    'status'=>400,
                    'message'=>$validation->errors()->first(),
                ]
                );
        }else{
            if($request->hasFile('image')){
                $image_name = request->name.time().'.'.$request->image->extension();
                $request->image->move(public_path('images/'),$image_name);
            }
            $user  = User::updateOrCreate(
                ['id'=>Auth::User()->id],
                [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'image'=>$request->image,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'twitter_link'=>$request->twitter_link,
                    'fb_link'=>$request->fb_link,
                    'insta_link'=>$request->insta_link,
                ]
            );
            return response()->json(
                [
                    'status'=>200,
                    'message'=>'Successfully Updated',
                ]
                );
        }
    }
}
