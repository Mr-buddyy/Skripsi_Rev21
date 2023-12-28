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

// Route Sponsor
Route::prefix('sponsor')->middleware(['sponsor'])->group(function () {
    Route::get('sponsorship', [SponsorController::class, 'sponsorship'])->name('sponsor.mahasiswa'); // show page mahasiswa tab
});
