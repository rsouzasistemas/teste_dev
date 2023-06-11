<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    function state_users() {
        return $this->hasMany(User::class, 'state_id', 'id');
    }

    function state_cities() {
        return $this->hasMany(City::class, 'state_id', 'id');
    }
}
