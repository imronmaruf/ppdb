<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrtuController;
use App\Http\Controllers\Admin\WaliController;
use App\Http\Controllers\Admin\BerkasController;
use App\Http\Controllers\Admin\PendaftarDiterima;
use App\Http\Controllers\Landing\BeritaController;
use App\Http\Controllers\Landing\GaleriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersDataController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Kepsek\KepsekDataPendaftar;
use App\Http\Controllers\Landing\FasilitasController;
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\FormPendaftaranController;
use App\Http\Controllers\Landing\LandingBeritaController;
use App\Http\Controllers\Landing\TentangKontakController;
use App\Http\Controllers\Landing\KategoriBeritaController;

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
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
// Route::get('/blog', [LandingBeritaController::class, 'index'])->name('blog.index');
// Route::get('/blog/detail', [LandingBeritaController::class, 'detailBerita'])->name('detail.index');

// Route::group(['prefix' => 'berita'], function () {
//     Route::get('/', [LandingBeritaController::class, 'index'])->name('berita.index');
//     Route::get('/{slug}', [LandingBeritaController::class, 'show'])->name('berita.show');
// });

Route::group(['prefix' => 'berita'], function () {
    Route::get('/', [LandingBeritaController::class, 'index'])->name('berita.index');
    Route::get('/pengumuman', [LandingBeritaController::class, 'indexPengumuman'])->name('berita.indexPengumuman');
    Route::get('/{slug}', [LandingBeritaController::class, 'show'])->name('berita.show');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/cetak-formulir', [DashboardController::class, 'cetakFormulir'])->name('admin.cetakFormulir');


    // rute fungsi untuk siswa
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
        Route::get('/lengkapi/{id}', [BerkasController::class, 'lengkapiBerkas'])->name('data-berkas.lengkapi');
        Route::post('/store', [BerkasController::class, 'store'])->name('data-berkas.store');
        Route::get('/edit/{id}', [BerkasController::class, 'edit'])->name('data-berkas.edit');
        Route::put('/update/{id}', [BerkasController::class, 'update'])->name('data-berkas.update');
    });


    // rute fungsi untuk admin
    Route::prefix('data-user')->middleware('can:admin-only')->group(function () {
        Route::get('/', [UsersDataController::class, 'index'])->name('data-user.index');
        Route::get('/create', [UsersDataController::class, 'create'])->name('data-user.create');
        Route::post('/store', [UsersDataController::class, 'store'])->name('data-user.store');
        Route::get('/edit/{id}', [UsersDataController::class, 'edit'])->name('data-user.edit');
        Route::put('/update/{id}', [UsersDataController::class, 'update'])->name('data-user.update');
        Route::delete('/destroy/{id}', [UsersDataController::class, 'destroy'])->name('data-user.destroy');
    });

    Route::prefix('data-pendaftar')->middleware('can:admin-only')->group(function () {
        Route::get('/', [DataPendaftarController::class, 'index'])->name('data-pendaftar.index');
        Route::get('/show/{id}', [DataPendaftarController::class, 'show'])->name('data-pendaftar.show');
        Route::post('/data-pendaftar/{id}/update-status', [DataPendaftarController::class, 'updateStatus'])->name('data-pendaftar.update-status');
        Route::delete('/destroy/{id}', [DataPendaftarController::class, 'destroy'])->name('data-pendaftar.destroy');
        Route::get('/diterima', [PendaftarDiterima::class, 'index'])->name('data-pendaftar.diterima');
        Route::get('/admin/data-pendaftar', [DataPendaftarController::class, 'index'])->name('admin.data-pendaftar');
        Route::get('/admin/cetak-laporan', [DataPendaftarController::class, 'cetakLaporan'])->name('admin.cetakLaporan');
        Route::get('/export-excel', [DataPendaftarController::class, 'exportExcel'])->name('admin.exportExcel');
    });

    Route::prefix('kepsek-data-pendaftar')->middleware('can:kepsek-only')->group(function () {
        Route::get('/', [KepsekDataPendaftar::class, 'index'])->name('kepsek-data-pendaftar.index');
        Route::get('/show/{id}', [KepsekDataPendaftar::class, 'show'])->name('kepsek-data-pendaftar.show');
        Route::get('/kepsek/data-pendaftar', [KepsekDataPendaftar::class, 'index'])->name('kepsek.data-pendaftar');
        Route::get('/kepsek/cetak-laporan', [KepsekDataPendaftar::class, 'cetakLaporan'])->name('kepsek.cetakLaporan');
        Route::get('/export-excel', [KepsekDataPendaftar::class, 'exportExcel'])->name('kepsek.exportExcel');
    });


    // crud Landing page

    Route::prefix('tentang-kontak')->middleware('can:admin-only')->group(function () {
        Route::get('/', [TentangKontakController::class, 'index'])->name('tentang-kontak.index');
        Route::get('/create', [TentangKontakController::class, 'create'])->name('tentang-kontak.create');
        Route::post('/store', [TentangKontakController::class, 'store'])->name('tentang-kontak.store');
        Route::get('/edit/{id}', [TentangKontakController::class, 'edit'])->name('tentang-kontak.edit');
        Route::put('/update/{id}', [TentangKontakController::class, 'update'])->name('tentang-kontak.update');
    });

    Route::prefix('fasilitas')->middleware('can:admin-only')->group(function () {
        Route::get('/', [FasilitasController::class, 'index'])->name('fasilitas.index');
        Route::get('/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
        Route::post('/store', [FasilitasController::class, 'store'])->name('fasilitas.store');
        Route::get('/edit/{id}', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
        Route::put('/update/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
        Route::delete('fasilitas/delete-selected', [FasilitasController::class, 'deleteSelected'])->name('fasilitas.delete.selected');
    });

    Route::prefix('galeri')->middleware('can:admin-only')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('galeri.index');
        Route::get('/create', [GaleriController::class, 'create'])->name('galeri.create');
        Route::post('/store', [GaleriController::class, 'store'])->name('galeri.store');
        Route::get('/edit/{id}', [GaleriController::class, 'edit'])->name('galeri.edit');
        Route::put('/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');
        Route::delete('galeri/delete-selected', [GaleriController::class, 'deleteSelected'])->name('galeri.delete.selected');
    });

    // berita

    Route::prefix('kategori-berita')->middleware('can:admin-only')->group(function () {
        Route::get('/', [KategoriBeritaController::class, 'index'])->name('kategori-berita.index');
        Route::get('/create', [KategoriBeritaController::class, 'create'])->name('kategori-berita.create');
        Route::post('/store', [KategoriBeritaController::class, 'store'])->name('kategori-berita.store');
        Route::get('/edit/{id}', [KategoriBeritaController::class, 'edit'])->name('kategori-berita.edit');
        Route::put('/update/{id}', [KategoriBeritaController::class, 'update'])->name('kategori-berita.update');
        Route::delete('/destroy/{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori-berita.destroy');
    });

    Route::prefix('data-berita')->middleware('can:admin-only')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('data-berita.index');
        Route::get('/show/{id}', [BeritaController::class, 'show'])->name('data-berita.show');
        Route::get('/create', [BeritaController::class, 'create'])->name('data-berita.create');
        Route::post('/store', [BeritaController::class, 'store'])->name('data-berita.store');
        Route::get('/edit/{id}', [BeritaController::class, 'edit'])->name('data-berita.edit');
        Route::put('/update/{id}', [BeritaController::class, 'update'])->name('data-berita.update');
        Route::delete('/destroy/{id}', [BeritaController::class, 'destroy'])->name('data-berita.destroy');
    });
});
