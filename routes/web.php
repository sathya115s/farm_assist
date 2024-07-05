<?php

use App\Http\Controllers\CropactivitiesController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\LivestocksInsuranceController;
use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/',[LoginController::class,'index']);

Route::get('/homepage',[LoginController::class,'home'])->name('homepage');

Route::get('/show_weather_page',[WeatherController::class,'show_weather_page'])->name('show_weather_page');
Route::get('/showcrop',[CropController::class,'showcrop'])->name('showcrop');
Route::get('/onion-data', [CropController::class, 'getOnionData']);

Route::get('/cropactivities',[CropactivitiesController::class,'getcropactivity'])->name('cropactivities');
Route::get('/cropactivities/{crop}', [CropactivitiesController::class, 'getCropActivities']);
