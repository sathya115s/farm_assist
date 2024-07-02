<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\LivestocksInsuranceController;
use App\Http\Controllers\FinancalController;

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

Route::get('/homepage',[LoginController::class,'home']);

Route::get('/insurance-show',[InsuranceController::class,'insurance_show'])->name('insurance_show');

Route::get('/Livestockinsurance-show',[InsuranceController::class,'LivestocksInsurance_show'])->name('live_insurance');


Route::get('/Livestocksinsurancelink-show',[InsuranceController::class,'LivestocksInsurancelink_show'])->name('liveinsurance_link');

Route::get('/financial',[FinancalController::class,'financial'])->name('financial');
Route::get('/income',[FinancalController::class,'income'])->name('income');