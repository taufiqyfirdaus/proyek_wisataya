<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('template.frontend.default');
// });
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/{province}/{city}/{content}', [HomepageController::class, 'detailContent'])->name('detailContent');
Route::get('/province/{province}', [HomepageController::class, 'getContentProvince'])->name('getContentProvince');
Route::get('/province', [HomepageController::class,'getProvince'])->name('getProvince');
Route::get('/result', [HomepageController::class, 'result'])->name('result');


Auth::routes();
// Route::get('logout', [LoginController::class, 'logout']);
Route::get('/administrator', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::prefix('administrator')->middleware(['auth', 'role:administrator'])->group(function () {
    // Route::resource('province', ProvinceController::class);

    Route::get('province', [ProvinceController::class,'index'])->name('province.index');
    Route::get('/administrator/province/create', [ProvinceController::class,'create'])->name('province.create');
    Route::post('/administrator/province/create', [ProvinceController::class,'store'])->name('province.store');
    Route::get('/province/{province}/edit', [ProvinceController::class,'edit'])->name('province.edit');
    Route::put('/province/{province}/edit', [ProvinceController::class,'update'])->name('province.update');
    Route::delete('/province/{province}/delete', [ProvinceController::class,'destroy'])->name('province.destroy');

    Route::get('province/{province}/city', [CityController::class,'index'])->name('city.index');
    Route::get('province/{province}/city/create', [CityController::class,'create'])->name('city.create');
    Route::post('province/{province}/city/create', [CityController::class,'store'])->name('city.store');
    Route::get('province/{province}/city/{city}/edit', [CityController::class,'edit'])->name('city.edit');
    Route::put('province/{province}/city/{city}/edit', [CityController::class,'update'])->name('city.update');
    Route::delete('province/{province}/city/{city}/delete', [CityController::class,'destroy'])->name('city.delete');
    // Route::resource('content',ContentController::class);
    Route::get('/content/{content}/status', [ContentController::class,'editStatus'])->name('content.editStatus');
    Route::put('/content/{content}/status', [ContentController::class,'updateStatus'])->name('content.updateStatus');

    // Route::resource('user', UserController::class);
    Route::get('user', [UserController::class,'index'])->name('user.index');
    Route::get('/administrator/user/create', [UserController::class,'create'])->name('user.create');
    Route::post('/administrator/user/create', [UserController::class,'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class,'edit'])->name('user.edit');
    Route::put('/user/{user}/edit', [UserController::class,'update'])->name('user.update');
    Route::delete('/user/{user}/delete', [UserController::class,'destroy'])->name('user.destroy');
});
// Route::prefix('administrator')->middleware(['auth', 'role:contributor'])->group(function () {
    // Route::resource('content', ContentController::class);
    // Route::resource('administrator/content', ContentController::class);
    Route::get('/content', [HomepageController::class, 'otherContent'])->name('otherContent');

    Route::get('administrator/content', [ContentController::class,'index'])->name('content.index');
    Route::get('/content/create', [ContentController::class,'create'])->name('content.create');
    Route::post('/content/create', [ContentController::class,'store'])->name('content.store');
    Route::get('/content/{content}', [ContentController::class,'show'])->name('content.show');
    Route::get('/administrator/content/{content}/edit', [ContentController::class,'edit'])->name('content.edit');
    Route::put('/administrator/content/{content}/edit', [ContentController::class,'update'])->name('content.update');
    Route::delete('administrator/content/{content}/delete', [ContentController::class,'destroy'])->name('content.destroy');
    
    // });
    