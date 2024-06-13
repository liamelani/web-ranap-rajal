<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PasienRawatInapController;
use App\Http\Controllers\DiagnosaRawatInapController;
use App\Http\Controllers\DiagnosaRawatJalanController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\LaporanRawatInapController;
use App\Http\Controllers\LaporanRawatJalanController;
use App\Http\Controllers\PasienRawatJalanController;
use App\Http\Controllers\AdministrasiController; // Tambahkan controller AdministrasiController


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registersimpan')->name('register.simpan');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        // Routes for admin
        Route::resource('patients', PatientsController::class);
        Route::resource('doctors', DoctorController::class)->except(['show']); // Mengecualikan metode show dari resource route
        Route::get('doctors/print', [DoctorController::class, 'print'])->name('doctors.print');
        Route::resource('perawat', PerawatController::class)->except(['show']);
        Route::get('perawat/print', [PerawatController::class, 'print'])->name('perawat.print');
        Route::resource('kamar', KamarController::class)->except(['show']);
        Route::get('kamar/print', [KamarController::class, 'print'])->name('kamar.print');
        Route::get('administrasi', [AdministrasiController::class, 'index'])->name('administrasi'); // Tambahkan rute untuk halaman administrasi
        Route::get('/search-laporan', [AdministrasiController::class, 'searchLaporan'])->name('searchLaporan'); // Tambahkan rute untuk pencarian laporan
       
    });

    Route::middleware('role:petugas_pendaftaran,admin')->group(function () {
        // Routes for petugas pendaftaran
        Route::resource('pasien_rawat_inap', PasienRawatInapController::class)->except(['show']); // Tambahkan 'show' kembali
        Route::get('pasien_rawat_inap/print', [PasienRawatInapController::class, 'print'])->name('pasien_rawat_inap.print');
        Route::resource('pasien_rawat_jalan', PasienRawatJalanController::class)->except(['show']);
        Route::get('pasien_rawat_jalan/print', [PasienRawatJalanController::class, 'print'])->name('pasien_rawat_jalan.print');
    });

    Route::middleware('role:dokter,admin')->group(function () {
        // Routes for dokter
        Route::resource('diagnosa_rawat_jalan', DiagnosaRawatJalanController::class)->except(['show']);
        Route::resource('diagnosa_rawat_inap', DiagnosaRawatInapController::class)->except(['show']); // Mengecualikan metode show dari resource route
        Route::get('diagnosa_rawat_inap/print', [DiagnosaRawatInapController::class, 'print'])->name('diagnosa_rawat_inap.print');
        Route::get('diagnosa_rawat_jalan/print', [DiagnosaRawatJalanController::class, 'print'])->name('diagnosa_rawat_jalan.print');
    });

    Route::middleware('role:apotek,admin')->group(function () {
        Route::resource('obat', ObatController::class)->except(['show']);
        Route::get('obat/print', [ObatController::class, 'print'])->name('obat.print'); // Tambahkan rute untuk mencetak data obat
    });

    Route::middleware('role:perawat,admin')->group(function () {
        Route::resource('laporan_rawat_inap', LaporanRawatInapController::class)->except(['show']);
        Route::get('laporan_rawat_inap/print', [LaporanRawatInapController::class, 'print'])->name('laporan_rawat_inap.print'); // Tambahkan rute untuk mencetak data laporan rawat inap
        Route::resource('laporan_rawat_jalan', LaporanRawatJalanController::class)->except(['show']);
        Route::get('laporan_rawat_jalan/print', [LaporanRawatJalanController::class, 'print'])->name('laporan_rawat_jalan.print');
    });
    
});
