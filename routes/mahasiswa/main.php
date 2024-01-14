<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;

// Route Mahasiswa
Route::group(['middleware' => ['mahasiswa']], function () {
    Route::get('', [MahasiswaController::class, 'home'])->name('home.mahasiswa-page');
    Route::get('sponsor', [MahasiswaController::class, 'sponsor'])->name('sponsor.mahasiswa-page');
    Route::get('about', [MahasiswaController::class, 'about'])->name('about.mahasiswa-page');
    Route::get('contact', [MahasiswaController::class, 'contact'])->name('contact.mahasiswa-page');
    Route::get('event', [MahasiswaController::class, 'event'])->name('event.mahasiswa-page');
    Route::get('profile', [ProfileController::class, 'Profile'])->name('profile.mahasiswa-page');
    Route::get('sponsorship', [MahasiswaController::class, 'sponsorship'])->name('sponsorship.mahasiswa-page');
    Route::post('pesan', [MahasiswaController::class, 'message'])->name('message');
});
