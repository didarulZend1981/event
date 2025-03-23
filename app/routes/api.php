<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\EventsController;
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
Route::get('/user/{id}', [AuthController::class, 'user'])->middleware('auth:sanctum');

/****************
 * Users
 * **********
 */
// get all users:
Route::get('/users', [UsersController::class, 'getUsers']);
// create user:
Route::post('/create-user', [UsersController::class, 'createUser']);
// Route::get('/user/{id}', [UsersController::class, 'getUser']);
Route::put('/update-user/{id}', [UsersController::class, 'updateUser']);
Route::delete('/delete-user/{id}', [UsersController::class, 'deleteUser']);
//=====
/****************
 * Events
 * **********
 */

 Route::get('/events', [EventsController::class, 'events']);
 Route::get('/event/{event}', [EventsController::class, 'getEvent']);
 Route::put('/event/update/{id}', [EventsController::class, 'updateEvent']);
 Route::post('/event', [EventsController::class, 'createEvent']);
 Route::delete('/delete-event/{id}', [EventsController::class, 'deleteEvent']);
/****************
 * Bookings
 * **********
 */
Route::get('/bookings', [BookingsController::class, 'getAllbookings']);
