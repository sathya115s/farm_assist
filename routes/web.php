<?php

use App\Http\Controllers\AgricultureController;
use App\Http\Controllers\CropactivitiesController;
use App\Http\Controllers\CropdataController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FinanceCOntroller;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Models\Livetock;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MarketpriceController;
use App\Http\Controllers\FarmsetupController;


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


//display the index page here
Route::get('/',[LoginController::class,'index']);

//display the homepage here
Route::get('/homepage',[LoginController::class,'home'])->name('homepage');


//weather part
Route::get('/show_weather_page',[WeatherController::class,'show_weather_page'])->name('show_weather_page');

//crop part
Route::get('/showcrop',[CropdataController::class,'showcrop'])->name('showcrop');

Route::get('/cropactivities',[CropactivitiesController::class,'getcropactivity'])->name('cropactivities');
// Route::get('/getcropactivities/{crop}', [CropactivitiesController::class, 'getCropActivities']);
Route::get('/getcropactivities/{crop}', [CropactivitiesController::class, 'getCropActivities']);



// Route to fetch all crops
Route::get('/getcropactivities', [CropdataController::class, 'getCrops']);

// Route to fetch activities for a selected crop
Route::get('/getcrop/{cropName}', [CropdataController::class, 'getActivitiesForCrop']);

// Route to fetch activity schedule based on selections
Route::get('/getactivityschedule/{cropName}/{soilType}/{plantingType}', [CropdataController::class, 'getActivitySchedule']);




//insurance part
Route::get('/insurance',[InsuranceController::class,'show_insurance'])->name('show_insurance');

//livestock part
Route::get('/livestock',[LivestockController::class,'show_livestock'])->name('show_livestock');

Route::get('/show_livestock',[LivestockController::class,'show']);
Route::post('/add_cattel',[LivestockController::class,'add'])->name('add_livestock');
// Route::get('/livestock/{id}', [LivestockController::class, 'show']);
Route::get('/edit_livestock/{id}', [LivestockController::class, 'edit'])->name('edit_livestock');
Route::post('/update_livestock/{id}', [LivestockController::class, 'update']);
Route::post('/add_doctor', [LivestockController::class, 'updateReport']);

Route::get('/get_doctor_info/{id}', [LivestockController::class, 'getDoctorInfo']);
Route::post('save_doctor_info/{id}',[LivestockController::class,'save_doctor_info'])->name('save_doctor_info');


//marketprice
Route::get('/market_price',[MarketpriceController::class,'market_price'])->name('market_price');

Route::get('/show_finance', [FinanceCOntroller::class, 'show_finance'])->name('show_finance_page');
Route::get('/get_finance', [FinanceCOntroller::class, 'getFinance']);
Route::post('/add_income', [FinanceCOntroller::class, 'addIncome']);
Route::post('/add_expense', [FinanceCOntroller::class, 'addExpense']);
Route::post('/add_setup', [FinanceCOntroller::class, 'addSetup']);
Route::get('/get_analytics', [FinanceCOntroller::class, 'getAnalytics']);
Route::get('/get_income_items', [FinanceCOntroller::class, 'getIncomeItems']);
