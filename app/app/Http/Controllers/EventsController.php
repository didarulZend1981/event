<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class EventsController extends Controller
{
    public function events(){
        $events = Event::all();
        return response()->json([
            'status'=> true,
            'message'=> 'Events data',
            'data'=> $events
        ], 200);
    }

    public function getEvent(Event $event) {
        return response()->json([
            'status'=> true,
            'message'=> 'Event data',
            'data'=> $event,
            'data'=> new EventResource($event),
        ], 200);
    }

    public function updateEvent(Request $request) {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'ticket_price' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'validation error',
                'errors'=> $validation->errors()
            ], 400);
        }

        $event = Event::findOrFail($request->id);

        $event->update($request->all());

        return response()->json(['message' => 'update success', 'data'=> new EventResource($event)]);
    }

    public function createEvent(Request $request){
        // dd($request->role);
        $request->validate([
            'title' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);


        $event = Event::create([
            'title' => $request->title,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'ticket_price' => $request->ticket_price,
            'descriptions' => $request->descriptions,

        ]);


        return response()->json([
            'status'=> true,
            'message'=> 'Event insert  successfull',
            'data'=> new EventResource($event),

        ], 200);

    }







}
