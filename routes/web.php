<?php

use App\Http\Controllers\Admin\BerkasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FormPendaftaranController;
use App\Http\Controllers\Admin\OrtuController;
use App\Http\Controllers\Admin\WaliController;
use App\Http\Controllers\Landing\LandingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ===== Landings Route ===== //
Route::resource('/', LandingController::class)->only([
    'index'
]);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/cetak-formulir', [DashboardController::class, 'cetakFormulir'])->name('admin.cetakFormulir');

    Route::prefix('data-pendaftaran')->middleware('can:siswa-only')->group(function () {
        Route::get('/', [FormPendaftaranController::class, 'index'])->name('data-pendaftaran.index');
        Route::get('/create', [FormPendaftaranController::class, 'create'])->name('data-pendaftaran.create');
        Route::post('/store', [FormPendaftaranController::class, 'store'])->name('data-pendaftaran.store');
        Route::get('/edit/{id}', [FormPendaftaranController::class, 'edit'])->name('data-pendaftaran.edit');
        Route::put('/update/{id}', [FormPendaftaranController::class, 'update'])->name('data-pendaftaran.update');
    });

    Route::prefix('data-ortu')->middleware('can:siswa-only')->group(function () {
        Route::get('/', [OrtuController::class, 'index'])->name('data-ortu.index');
        Route::get('/create', [OrtuController::class, 'create'])->name('data-ortu.create');
        Route::post('/store', [OrtuController::class, 'store'])->name('data-ortu.store');
        Route::get('/edit/{id}', [OrtuController::class, 'edit'])->name('data-ortu.edit');
        Route::put('/update/{id}', [OrtuController::class, 'update'])->name('data-ortu.update');
    });

    Route::prefix('data-wali')->middleware('can:siswa-only')->group(function () {
        Route::get('/', [WaliController::class, 'index'])->name('data-wali.index');
        Route::get('/create', [WaliController::class, 'create'])->name('data-wali.create');
        Route::post('/store', [WaliController::class, 'store'])->name('data-wali.store');
        Route::get('/edit/{id}', [WaliController::class, 'edit'])->name('data-wali.edit');
        Route::put('/update/{id}', [WaliController::class, 'update'])->name('data-wali.update');
    });


    Route::prefix('data-berkas')->middleware('can:siswa-only')->group(function () {
        Route::get('/', [BerkasController::class, 'index'])->name('data-berkas.index');
        Route::get('/create', [BerkasController::class, 'create'])->name('data-berkas.create');
        Route::post('/store', [BerkasController::class, 'store'])->name('data-berkas.store');
        Route::get('/edit/{id}', [BerkasController::class, 'edit'])->name('data-berkas.edit');
        Route::put('/update/{id}', [BerkasController::class, 'update'])->name('data-berkas.update');
    });
});
