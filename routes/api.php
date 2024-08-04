<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropactivitiesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\IncomeController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/cropactivities',[CropactivitiesController::class,'getcropactivity'])->name('cropactivities');
Route::get('/getcropactivities/{crop}', [CropactivitiesController::class, 'getCropActivities']);
Route::get('/user',[LoginController::class,'getusers']);
Route::post('/add_cattle',[LivestockController::class,'add']);
Route::get('/show_cattle',[LivestockController::class,'show']);

//livestock part
Route::get('/livestock',[LivestockController::class,'show_livestock'])->name('show_livestock');
Route::get('/show_livestock',[LivestockController::class,'show']);

Route::get('/get_analytics', [IncomeController::class, 'getAnalytics']);
