<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CriteriaController;
// use App\Http\Controllers\AlteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\TestingController;

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




Route::get('/', [LoginController::class, 'index'])->name('awal');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('alternative', AlternativeController::class);
    Route::resource('criteria', CriteriaController::class);
    Route::resource('subcriteria', SubController::class);
    Route::get('/subcriteria/{id}', [SubController::class, 'destroy'])->name('hapus_sub');
    Route::post('/subcriteria/update/{id}', [SubController::class, 'update'])->name('update_sub');
    Route::resource('/penilaian', PenilaianController::class);

    Route::resource('testing', TestingController::class);
    
});
