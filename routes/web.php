<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\BeritaArtikelController;
use App\Http\Controllers\PengaturanAkunController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\BlogController;

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

Route::get('/', [BlogController::class, 'beranda']);

/* -------------------------------------------------------------------------------------------- */
/* prefix admin/*                                                                         */
/* -------------------------------------------------------------------------------------------- */
Route::group(['prefix' => 'admin'], function () {

    /* ------------------------------------------------------------------------------------------------ */
    /* Middleware guest                                                                                 */
    /* ------------------------------------------------------------------------------------------------ */
    Route::middleware(['guest'])->group(function () {
        /* -------------------------------------------------------------------------------------------- */
        /* prefix auth/*                                                                           */
        /* -------------------------------------------------------------------------------------------- */
        Route::group(['prefix' => 'auth'], function () {
            // Route login
            Route::get('login', [AuthController::class, 'login'])->name('login');
            Route::post('login', [AuthController::class, 'auth_login'])->name('auth_login');
        });

        /* -------------------------------------------------------------------------------------------- */
        /* Blog                                                                                         */
        /* -------------------------------------------------------------------------------------------- */
        

    });

    /* ------------------------------------------------------------------------------------------------ */
    /* Middleware auth                                                                                  */
    /* ------------------------------------------------------------------------------------------------ */
    Route::middleware(['auth'])->group(function () {
        /* -------------------------------------------------------------------------------------------- */
        /* prefix auth/*                                                                           */
        /* -------------------------------------------------------------------------------------------- */
        Route::group(['prefix' => 'auth'], function () {
            // Route logout
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        });

        // Route admin
        Route::get('/', [BerandaController::class, 'admin'])->name('admin');

        /* -------------------------------------------------------------------------------------------- */
        /* prefix tentang/*                                                                             */
        /* -------------------------------------------------------------------------------------------- */
        Route::group(['prefix' => 'tentang'], function () {
            // Route profil
            Route::resource('profil', ProfilController::class);

            // Route visi-misi
            Route::resource('visi-misi', VisiMisiController::class);

            // Pegawai
            Route::delete('struktur-organisasi/destroy-all', [StrukturOrganisasiController::class, 'destroyAll'])->name('struktur-organisasi.destroy-all');
            Route::resource('struktur-organisasi', StrukturOrganisasiController::class);
        });

        // Route program kerja
        Route::delete('program-kerja/destroy-all', [ProgramKerjaController::class, 'destroyAll'])->name('program-kerja.destroy-all');
        Route::resource('program-kerja', ProgramKerjaController::class);

        // Route berita artikel
        Route::delete('berita-artikel/destroy-all', [BeritaArtikelController::class, 'destroyAll'])->name('berita-artikel.destroy-all');
        Route::resource('berita-artikel', BeritaArtikelController::class);

        // Route kontak
        Route::resource('kontak', KontakController::class);

        // Route pengaturan akun
        Route::resource('pengaturan-akun', PengaturanAkunController::class);
    });
});
