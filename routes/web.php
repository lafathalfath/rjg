<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Authenticated\ApplicationController;
use App\Http\Controllers\Authenticated\DashboardController;
use App\Http\Controllers\Authenticated\LayoutController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'loginView'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/application')->group(function () {
        Route::get('/{id}', [ApplicationController::class, 'index'])->name('application');
        Route::post('/store', [ApplicationController::class, 'store'])->name('application.store');

        Route::get('/{app_id}/layouts', [LayoutController::class, 'index'])->name('layouts');
        Route::post('/layout/store', [LayoutController::class, 'store'])->name('layout.store');
        Route::get('/layout/{id}/edit', [LayoutController::class, 'edit'])->name('layout.edit');
    });
});