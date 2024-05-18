<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\BeritaArtikelController;
use App\Http\Controllers\PengaturanAkunController;
use App\Http\Controllers\StrukturOrganisasiController;

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


/* -------------------------------------------------------------------------------------------- */
/* prefix /BlogController.php                                                                   */
/* -------------------------------------------------------------------------------------------- */

// Route beranda
Route::get('/', [BlogController::class, 'beranda']);
Route::post('/', [BlogController::class, 'beranda']);

// Route tentang
Route::group(['prefix' => 'tentang'], function () {
    Route::get('profil', [BlogController::class, 'profil']);
    Route::get('visi-misi', [BlogController::class, 'visiMisi']);
    Route::get('struktur-organisasi', [BlogController::class, 'strukturOrganisasi']);
});

// Route program kerja
Route::get('/program-kerja', [BlogController::class, 'programKerja']);

// Route galeri
Route::group(['prefix' => 'galeri'], function () {
    Route::get('foto', [BlogController::class, 'galeriFoto'])->name('galeri-foto');
    Route::get('video', [BlogController::class, 'galeriVideo'])->name('galeri-video');
});

// Route berita artikel
Route::get('/berita-artikel', [BlogController::class, 'beritaArtikel'])->name('berita-artikel');
Route::get('/berita-artikel/{id}', [BlogController::class, 'beritaArtikel'])->name('berita-artikel.detail');

// Route kontak
Route::get('/kontak', [BlogController::class, 'kontak']);


/* -------------------------------------------------------------------------------------------- */


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

        /* -------------------------------------------------------------------------------------------- */
        /* prefix galeri/*                                                                             */
        /* -------------------------------------------------------------------------------------------- */
        Route::group(['prefix' => 'galeri'], function () {
            // Route foto
            Route::delete('foto/destroy-all', [FotoController::class, 'destroyAll'])->name('foto.destroy-all');
            Route::resource('foto', FotoController::class);

            // Route video
            Route::delete('video/destroy-all', [VideoController::class, 'destroyAll'])->name('video.destroy-all');
            Route::resource('video', VideoController::class);
        });

        // Route kontak
        Route::resource('kontak', KontakController::class);

        // Route pengaturan akun
        Route::resource('pengaturan-akun', PengaturanAkunController::class);

        // Route riwayat aktivitas
        Route::get('riwayat-aktivitas/{id}', [BerandaController::class, 'riwayatAktivitas']);
    });
});

/* -------------------------------------------------------------------------------------------- */