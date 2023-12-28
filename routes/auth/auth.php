<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



//Route Login
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::post('logout', [AuthController::class, 'logout']);
//Route Register
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('register');
