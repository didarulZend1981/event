<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'event_id', 'ticket_qty', 'ticket_price', 'total_price', 'status']; 
}
