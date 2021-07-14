<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    //
    public function index()
    {
        // $cities = auth()->user()->posts;
 
        // return response()->json([
        //     'success' => true,
        //     'data' => $cities
        // ]);

        $cities = City::all();
        return response([ 'cities' =>  $cities, 
        'message' => 'Successful'], 200);
    }
}
