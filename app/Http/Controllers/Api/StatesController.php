<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function index() {
        $states = State::all()->pluck('state_name', 'id');
        return response()->json($states);
    }
}
