<?php

use App\Http\Controllers\CheckinController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\PrivacyStatementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'show'])->name('home');

Route::middleware('auth')->group(function() {
    Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
});

Route::prefix('/checkin')->name('checkin.')->group(function() {
    Route::get('/success', [CheckinController::class, 'success'])->name('success');
    Route::get('/{user_uuid}/new', [CheckinController::class, 'create'])->name('create');
    Route::post('/{user_uuid}/store', [CheckinController::class, 'store'])->name('store');
    Route::get('/', [CheckinController::class, 'index'])->name('index');
});

Route::prefix('/poster')->name('poster.')->group(function() {
    Route::middleware('auth')->group(function() {
        Route::post('/download/{user_uuid}', [PosterController::class, 'store'])->name('store');
    });
});

Route::prefix('/user')->middleware('auth')->name('user.')->group(function() {
    Route::prefix('/privacy')->name('privacy.')->group(function() {
        Route::post('/edit', [PrivacyStatementController::class, 'edit'])->name('edit');
    });
});


