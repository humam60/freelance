<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Offers;
use App\Models\skill;
use App\Models\category;

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

        // $cities = City::all();
        $offer = Offers::find(1);
        return response([ 'cities' =>  $offer->Category, 
        'message' => 'Successful'], 200);
    }
}
