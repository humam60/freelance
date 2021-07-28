<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\TrainingsCatController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SkillController;



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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);


    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', [AuthController::class,'logout']);
        Route::get('user', [AuthController::class,'user']);          
        

}); 

       Route::group(['middleware' =>['api','changelanguage']], function() {
        Route::resource('offers', OffersController::class); 
        Route::resource('requests',RequestsController::class);
        Route::resource('trainings', TrainingsController::class);
        Route::resource('trainingscat', TrainingsCatController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('event', EventController::class);
        Route::resource('city', CityController::class);
        Route::resource('location', LocationController::class);
        Route::resource('skill', SkillController::class);
        Route::post('upload', [ImageController::class, 'upload']);

 });
        Route::group(['middleware' =>['role:admin']], function() {
            Route::resource('requests', RequestsController::class);
            Route::resource('offers', RequestsController::class);
            Route::resource('Permission', PermissionController::class);
            Route::resource('roles', RolesController::class);
          
});
    



  







