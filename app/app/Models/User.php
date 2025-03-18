<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['role', 'name', 'email', 'password', 'profile_image'];
}
