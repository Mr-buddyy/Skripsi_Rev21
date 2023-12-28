<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnershipController;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Logout;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('profile', [ProfileController::class, 'Profile'])->name('profile.page');
Route::get('editprofil', [ProfileController::class, 'EditProfile'])->name('editprofile.page');
Route::post('editprofil', [ProfileController::class, 'store'])->name('editprofile.store');
