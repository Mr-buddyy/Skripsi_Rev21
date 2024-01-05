<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('profile', [ProfileController::class, 'Profile'])->name('profile.page');
Route::get('editprofil', [ProfileController::class, 'EditProfile'])->name('editprofile.page');
Route::post('editprofil', [ProfileController::class, 'store'])->name('editprofile.store');
