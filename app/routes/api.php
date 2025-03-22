<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/healthcheck', function(){
    return response()->json(['message' => 'API is working!']);
});


Route::post('/member-registration', [AuthController::class, 'memberRegistration']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


/****************
 * Users
 * **********
 */
// get all users:
Route::get('/users', [UsersController::class, 'getUsers']);
// create user:
Route::post('/create-user', [UsersController::class, 'createUser']);
Route::get('/user/{id}', [UsersController::class, 'getUser']);
Route::put('/update-user/{id}', [UsersController::class, 'updateUser']);
Route::delete('/delete-user/{id}', [UsersController::class, 'deleteUser']);
