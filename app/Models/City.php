<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    function city_users() {
        return $this->hasMany(User::class, 'city_id', 'id');
    }

    function cities_state() {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
