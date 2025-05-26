<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function(){
    return view('profil');
});

// Route::resource('/fakultas', FakultasController::class);
Route::resource('/prodi', ProdiController::class);
Route::resource('/fakultas', FakultasController::class);
Route::resource('/mahasiswa', MahasiswaController::class);

Route::get('/', function () {return view('layout.main');});
// Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi');
// Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
// Route::get('/fakultas/create', [FakultasController::class, 'create'])->name('fakultas.create');
// test