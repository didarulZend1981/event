<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller{

    public function getUsers(){
        $users = User::all();
        return response()->json($users);
    }

    public function createUser(Request $request){
        // dd($request->role);
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash  ::make($request->password),

        ]);


        return response()->json([
            'status'=> true,
            'message'=> 'user insert  successfull',
            'data'=> $user,

        ], 200);

    }

    public function getUser(Request $request, $id){
        $users = User::findOrFail($id);
        return response()->json($users);
    }


    public function updateUser(Request $request, $id){
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json(['message' => 'update success', 'data' => $user]);
    }

    public function deleteUser($id){
        User::destroy($id);
        return response()->json(['message' => 'delete success', 'data' => '']);
    }






}
