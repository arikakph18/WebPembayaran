<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/dashboard' ,[dashboardController::class, 'index']);
Route::get('/login' ,[loginController::class, 'index'])->name('login');
route::get('/register', [registerController::class, 'index']->name('login'));
route::post('/regist', [registerController::class, 'store']->name('register.store'));



