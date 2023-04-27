<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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



Route::inertia('/', 'Index');

Route::inertia('home', 'Home');

Route::inertia('game', 'Game');

Route::inertia('game/play', 'Play');

Route::get('visit/{type}', [App\Http\Controllers\VisitController::class, 'visit']);


Route::prefix('admin')->group(function(){
    Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'auth'])->name('login.auth');

    Route::middleware('auth')->group(function(){
        Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');


        Route::post('challenge', [\App\Http\Controllers\DashboardController::class, 'challenge'])->name('challenge');
        Route::post('remove-all', [\App\Http\Controllers\DashboardController::class, 'removeAll'])->name('challenge.remove');
        Route::get('challenge/{id}', [\App\Http\Controllers\DashboardController::class, 'edit'])->name('challenge.edit');
        Route::post('challenge/{id}', [\App\Http\Controllers\DashboardController::class, 'update'])->name('challenge.update');

        Route::get('visitors', [\App\Http\Controllers\VisitorController::class, 'index'])->name('visitor');
        Route::get('visitors/download', [\App\Http\Controllers\VisitorController::class, 'download'])->name('visitor.download');
        Route::get('social-visit', [App\Http\Controllers\VisitController::class, 'index'])->name('social-visit');


        Route::get('visitors/analytics', [\App\Http\Controllers\VisitorController::class, 'analytics'])->name('visitor.analytics');
    });
});
