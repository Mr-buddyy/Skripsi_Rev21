<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Route Admin
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('dashboard.admin-page');
    Route::get('/sponsorship', [HomeController::class, 'sponsorship'])->name('sponsorship.admin-page');
    Route::get('/akun', [HomeController::class, 'akun'])->name('akun.admin-page');
    Route::get('/feedback', [HomeController::class, 'feedback'])->name('feedback.admin-page');
    Route::get('/edit_konten', [HomeController::class, 'edit_konten'])->name('edit_konten.admin-page');
});
Route::post('update/{id}', [HomeController::class, 'update'])->name('update.account'); //upload mou
Route::delete('delete_account/{id}', [HomeController::class, 'destroyAccount'])->name('delete.account'); //delete account
Route::delete('delete_message/{id}', [HomeController::class, 'destroyMessage'])->name('delete.message'); //delete message
