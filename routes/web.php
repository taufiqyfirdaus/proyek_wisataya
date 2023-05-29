<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProvinceController;
use App\Models\Province;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/administrator', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::prefix('administrator')->middleware(['auth', 'role:administrator'])->group(function () {
    Route::resource('province', ProvinceController::class);
    Route::get('province/{province}/city', [CityController::class,'index'])->name('city.index');
    Route::get('province/{province}/city/create', [CityController::class,'create'])->name('city.create');
    Route::post('province/{province}/city/create', [CityController::class,'store'])->name('city.store');
    Route::get('province/{province}/city/{city}/edit', [CityController::class,'edit'])->name('city.edit');
    Route::put('province/{province}/city/{city}/edit', [CityController::class,'update'])->name('city.update');
    Route::delete('province/{province}/city/{city}/delete', [CityController::class,'destroy'])->name('city.delete');
    Route::resource('content',ContentController::class);
});