<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('not-found');
});

Route::get('/', function () {
    return redirect('/store');
});

/* This block of code defines a group of routes that are accessible only to guests, meaning users who
 are not authenticated. Within this group: */
Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/login', [AuthController::class, 'login'])->name('loginAdmin');
    Route::post('/admin/login', [AuthController::class, 'loginPost'])->name('loginAdmin');
});

Route::group(['middleware' => ['role:admin,owner,investor']], function () {
    Route::get('/admin/home', [HomeController::class, 'index'])->name('dashboardAdmin');
    Route::delete('/admin/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['role:admin,owner']], function () {
    //-- Route for crud layanan --//
    Route::resource('/admin/layanan/services', App\Http\Controllers\ServiceController::class);
    Route::resource('/admin/layanan/spareparts', App\Http\Controllers\SparepartController::class);
    Route::resource('/admin/layanan/programs', App\Http\Controllers\ProgramController::class);
    Route::resource('/admin/layanan/jokis', App\Http\Controllers\JokiController::class);
    Route::resource('/admin/layanan/topups', App\Http\Controllers\TopupController::class);
    Route::resource('/admin/layanan/minumans', App\Http\Controllers\MinumanController::class);
});

Route::group(['middleware' => ['role:admin,owner,investor']], function () {
    //-- Route for crud keanggotaan --//
    Route::resource('/admin/keanggotaan/admins', App\Http\Controllers\AdminController::class);
    Route::resource('/admin/keanggotaan/investors', App\Http\Controllers\InvestorController::class);
    Route::resource('/admin/keanggotaan/owners', App\Http\Controllers\OwnerController::class);
    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::group(['middleware' => ['role:admin,owner']], function () {
    //-- Route for crud pekerjaan --//
    Route::resource('/admin/pekerjaan/jobservices', App\Http\Controllers\JobServiceController::class);
    Route::resource('/admin/pekerjaan/jobspareparts', App\Http\Controllers\JobSparepartController::class);
    Route::resource('/admin/pekerjaan/jobprograms', App\Http\Controllers\JobProgramController::class);
    Route::resource('/admin/pekerjaan/jobjokis', App\Http\Controllers\JobJokiController::class);
    Route::resource('/admin/pekerjaan/jobtopups', App\Http\Controllers\JobTopupController::class);
    Route::resource('/admin/pekerjaan/jobminumans', App\Http\Controllers\JobMinumanController::class);
    Route::resource('/admin/pekerjaan/komisis', App\Http\Controllers\KomisiController::class);
});

Route::group(['middleware' => ['role:owner,investor']], function () {
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('laporanIndex');
});

Route::group(['middleware' => ['role:admin,owner']], function () {
    Route::resource('/admin/pengeluaran', App\Http\Controllers\PengeluaranController::class);
    Route::resource('/admin/store', App\Http\Controllers\StoreController::class);
});

Route::group(['middleware' => ['role:investor,owner']], function () {
    Route::get('/generate-pdf', [PdfController::class, 'generateFinancialReport'])->name('reportFinancial');
    Route::get('/generate-job-pdf', [PdfController::class, 'generateJobReport'])->name('reportJob');
});

Route::get('/store', [StoreController::class, 'showWebStore']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

require __DIR__ . '/auth.php';
