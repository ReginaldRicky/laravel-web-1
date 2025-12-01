<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;

Route::middleware('guest')->group(function () {

    Route::get('/auth', [AuthController::class, 'index'])->name('login');

    Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/', function () {
        return view('welcome');
    });
});

Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');

    Route::get('/home', [HomeController::class, 'index']);

    Route::middleware(['role:admin'])
        ->prefix('admin')
        ->group(function () {

            Route::resource('user', UserController::class);

            Route::resource('pelanggan', PelangganController::class);
        });
});
