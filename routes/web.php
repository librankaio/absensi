<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AproveAbsensiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterDataController;
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



// Route::get('/home', function () {
//     return view('layouts.main');
// })->name('home');
// Route::get('/mdata', function () {
//     return view('pages.master.masterdata');
// })->name('mdata');
// Route::get('/absensi', function () {
//     return view('pages.transaction.absen');
// })->name('absensi');
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'postLogin'])->name('postlogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/mdata', [MasterDataController::class, 'index'])->name('mdata');
    Route::post('/postmasterdata', [MasterDataController::class, 'postMasterData'])->name('postmasterdata');
    Route::get('/accabsen', [AproveAbsensiController::class, 'index'])->name('accabsen');
    Route::post('/postaccabsen', [AproveAbsensiController::class, 'postAproveAbsensi'])->name('postaccabsen');
    Route::get('/accabsen/{tabsent}/acc', [AproveAbsensiController::class, 'getAcc'])->name('approveabsent');
    Route::get('/accabsen/{tabsent}/decline', [AproveAbsensiController::class, 'getDecline'])->name('declineabsent');
    
    Route::get('/absen', [AbsensiController::class, 'index'])->name('absen');
    Route::post('/postabsen', [AbsensiController::class, 'postAbsen'])->name('postabsen');
});