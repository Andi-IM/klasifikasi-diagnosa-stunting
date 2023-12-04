<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBalitaController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\TesterController;
use App\Models\Klasifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

//dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


//data balita
Route::resource('balita', DataBalitaController::class)->except(['show'])->parameters([
    'balita' => 'balita_id'
]);
Route::get('balita/bulk', [DataBalitaController::class, 'massUploadForm'])->name('balita.bulk');
Route::post('balita/bulk', [DataBalitaController::class, 'massUpload'])->name('balita.saveBulk');


//klasifikasi naive bayes
Route::get('klasifikasi', [KlasifikasiController::class, 'list'])->name('klasifikasi.list');
Route::get('klasifikasi/proses', [KlasifikasiController::class, 'index'])->name('klasifikasi');
// Route::post('klasifikasi', [KlasifikasiController::class, 'klasifikasi'])->name('klasifikasi');
Route::post('klasifikasiaksi', [KlasifikasiController::class, 'klasifikasiaksi'])->name('klasifikasiaksi');

Route::get('uji', [TesterController::class, 'index'])->name('uji.index');
Route::post('uji', [TesterController::class, 'process'])->name('uji.process');
Route::get('uji/hasil', [TesterController::class, 'hasil'])->name('uji.hasil');

Route::get('layout', function () {
    return view('page.index');
});
