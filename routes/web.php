<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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
        Route::get('/', [DashboardController::class, 'admin'])->name('admin');
    });
});
