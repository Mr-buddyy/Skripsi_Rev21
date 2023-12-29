<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnershipController;



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

// include_once "sponsorship/main.php";
// include_once "mahasiswa/main.php";
// // include_once "auth/auth.php";
// include_once "admin/main.php";
// include_once "sponsor/main.php";
// include_once "profile/main.php";
Route::get('/chat', [ChatController::class, 'index']);
Route::post('/chat/send', [ChatController::class, 'send']);

//Route Login
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::post('logout', [AuthController::class, 'logout']);
//Route Register
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('register');

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

// Route Profil
Route::get('profile', [ProfileController::class, 'Profile'])->name('profile.page');
Route::get('editprofil', [ProfileController::class, 'EditProfile'])->name('editprofile.page');
Route::post('editprofil', [ProfileController::class, 'store'])->name('editprofile.store');

// Route Sponsor
Route::prefix('sponsor')->middleware(['sponsor'])->group(function () {
    Route::get('sponsorship', [SponsorController::class, 'sponsorship'])->name('sponsor.mahasiswa'); // show page mahasiswa tab
});

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
