<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AuthController;

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

include_once "sponsorship/main.php";
include_once "mahasiswa/main.php";
// include_once "auth/auth.php";
include_once "admin/main.php";
include_once "sponsor/main.php";
include_once "profile/main.php";
// Route::get('/chat', [ChatController::class, 'index']);
Route::post('/chat/send', [ChatController::class, 'send']);

//login
//Route Login
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::post('logout', [AuthController::class, 'logout']);
//Route Register
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('register');
