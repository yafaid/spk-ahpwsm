<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\Cek_login;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AHPController;
use App\Http\Controllers\WSMController;

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
//     return view('auth.login');
// });

    //login
    Route::get('/',[AuthController::class,'index'])
        ->name('viewlogin');

    Route::post('actionlogin', [AuthController::class, 'actionlogin'])
        ->name('actionlogin');
        
    Route::get('logout', [AuthController::class, 'logout'])
        ->name('logout');

    //dashboard
    Route::group(['middleware' => 'cek_login'], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');    
        Route::get('nilai', [DashboardController::class, 'nilaiview'])->name('karnilai');
        Route::get('karyawan', [DashboardController::class, 'karyawanview'])->name('karinput');
        Route::get('bobot', [DashboardController::class, 'bobotview'])->name('bobotatur');

        
    });

    //karyawan
    Route::middleware(['cek_login'])->group(function () {
        Route::post('karyawan/tambah', [KaryawanController::class, 'tambah'])->name('kartambah');
        Route::get('karyawan/{id}', [DashboardController::class, 'karyawanview'])->name('karedit');
        Route::get('karyawan/{id}', [KaryawanController::class, 'hapus'])->name('karhapus');
        Route::post('karyawan/{id}/edit', [KaryawanController::class, 'update'])->name('karupdate');
    });

    // bobot
    Route::post('aturbobot/tambah', [AHPController::class, 'tambah'])->name('bottambah');
    Route::post('aturbobot/hapus', [AHPController::class, 'hapus'])->name('bothapus');
    Route::post('sendtest', [AHPController::class, 'sendData']);

    Route::post('nilai', [WSMController::class, 'hitung'])
    ->name('nilkaryawan');
    Route::get('/reset-nilai', [WSMController::class, 'reset'])
    ->name('resetkaryawan');
    
    

        