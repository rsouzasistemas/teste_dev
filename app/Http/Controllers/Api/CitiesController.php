<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index(int $stateId = null) {

        $conditions = null;
        if (!empty($stateId) && is_int($stateId)) {
            $conditions = [
                ['state_id', '=', $stateId]
            ];
        }
        $cities = City::where($conditions)->pluck('city_name', 'id');
        return response()->json($cities);
    }
}
