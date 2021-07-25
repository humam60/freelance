<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\OffersController;
use App\Http\Controllers\API\TrainingsController;
use App\Http\Controllers\API\RequestsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class,'logout']);
        Route::get('user', [AuthController::class,'user']);
        
    });

   

});
  Route::middleware('auth:api')->group(function () {

  Route::resource('offers', OffersController::class);
  Route::resource('requests', RequestsController::class);
  Route::resource('trainings', TrainingsController::class);

});

// Route::resource('city', CityController::class);






