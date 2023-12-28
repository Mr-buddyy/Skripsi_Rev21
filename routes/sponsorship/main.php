<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PartnershipController;


// Route Mahasiswa
Route::group(['middleware' => ['mahasiswa']], function () {
    Route::get('details/{id}', [PartnershipController::class, 'details'])->name('details.show-page'); //show page details partnership
    Route::get('partnership/user_id={id}', [PartnershipController::class, 'partnership'])->name('partnership.mahasiswa-page'); //show page request partnership
    Route::post('partnership/{id}', [PartnershipController::class, 'store'])->name('partnership.store');    //upload request partnership
    Route::get('/pdf/{id}/download', [PartnershipController::class, 'downloadPdf'])->name('pdf.download'); //show MOU from sponsor
    Route::post('partnership/lpj/{id}', [PartnershipController::class, 'uploadBukti'])->name('photoevidence.store'); //show MOU from sponsor
});
Route::post('upload-mou/{id}', [PartnershipController::class, 'uploadMou'])->name('sponsor.upload'); //upload mou

Route::group(['middleware' => ['sponsor']], function () {
    Route::post('update-sponsor/{id}', [PartnershipController::class, 'update'])->name('sponsor.update'); //update status partnership
});
