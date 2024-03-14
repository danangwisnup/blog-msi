<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\ArtikelBeritaController;
use App\Http\Controllers\PengaturanAkunController;

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

Route::get('/', function () {
    return view('welcome');
});

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

            // Route pengurus
            Route::resource('pengurus', PengurusController::class);
        });

        // Route program kerja
        Route::delete('program-kerja/destroy-all', [ProgramKerjaController::class, 'destroyAll']);
        Route::resource('program-kerja', ProgramKerjaController::class);


        // Route artikel/berita
        Route::resource('artikel-berita', ArtikelBeritaController::class);

        // Route kontak
        Route::resource('kontak', KontakController::class);

        // Route pengaturan akun
        Route::resource('pengaturan-akun', PengaturanAkunController::class);
    });
});
