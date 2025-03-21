<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function memberRegistration(Request $request){

        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required',
            'profile_image' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if($validation->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'validation error',
                'errors'=> $validation->errors()
            ], 400);
        }

        $profile_image = null;
        if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $image_name = 'profile_image_'.time(). '.' . $image->getClientOriginalExtension();
            $image->storeAs('profile_image', $image_name);
            $profile_image = 'storage/profile_image/'.$image_name;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
            'profile_image' => $profile_image,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        // send registeration confirm mail



        return response()->json([
            'status'=> true,
            'message'=> 'Registration successfull',

            'token'=> $token
        ], 200);

    }






}
