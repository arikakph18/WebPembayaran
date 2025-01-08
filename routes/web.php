<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/dashboard' ,[dashboardController::class, 'admin.dashboard']);
Route::get('/login' ,[LoginController::class, 'index'])->name('login');
Route::get('/register', [RegistController::class, 'index'])->name('register');
Route::post('/regist', [RegistController::class, 'store'])->name('register.store');



