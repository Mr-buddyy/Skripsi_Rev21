<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SponsorController;

// Route Sponsor
Route::prefix('sponsor')->middleware(['sponsor'])->group(function () {
    Route::get('sponsorship', [SponsorController::class, 'sponsorship'])->name('sponsor.mahasiswa'); // show page mahasiswa tab
});
