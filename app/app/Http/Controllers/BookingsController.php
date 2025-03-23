<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function updateBooking(Request $request) {
        $validation = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'validation error',
                'errors'=> $validation->errors()
            ], 400);
        }

        $booking = Booking::with(['user', 'event'])->where('id', $request->id)->first();;

        $booking->update($request->all());

        return response()->json(['message' => 'update success', 'data'=> new BookingResource($booking)]);
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'user_id' => 'required',
            'event_id' => 'required',
            'ticket_qty' => 'required',
            'ticket_price' => 'required',
            'total_price' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'validation error',
                'errors'=> $validation->errors()
            ], 400);
        }

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'event_id' => $request->event_id,
            'ticket_qty' => $request->ticket_qty,
            'ticket_price' => $request->ticket_price,
            'total_price' => $request->total_price,
            'status' => 'pending',
        ]);

        return response()->json([
            'status'=> true,
            'message'=> 'Booking was successfull. Waiting for admin approval',
            'data'=> new BookingResource($booking)
        ], 200);
    }











}
