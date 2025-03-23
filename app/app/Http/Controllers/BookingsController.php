<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;


class BookingsController extends Controller
{
    public function getAllbookings(){
        $bookings = Booking::with(['user', 'event'])->get();
        return response()->json(['message'=> 'Data found', 'data'=> $bookings]);
    }

    public function getBooking(Request $request){
        $booking = Booking::with(['user', 'event'])->where('id', $request->id)->first();
        return response()->json(['message'=> 'Data found', 'data'=> new BookingResource($booking)]);
    }





}
