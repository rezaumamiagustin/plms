<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;

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
    return view('home');
});
//========ADMIN SISWA=========
Route::get('/Admin/a_siswa', [SiswaController::class, 'index']);
Route::get('/Admin/a_siswa/create', [SiswaController::class, 'create']);
// Route::post('/a_siswa', [SiswaController::class, 'store']);
Route::post('/a_siswa', [SiswaController::class, 'store'])->name('storeSiswaTambah');
Route::get('/Admin/a_siswa/edit/{siswa}', [SiswaController::class, 'edit']);
Route::patch('/Admin/a_siswa/{siswa}', [SiswaController::class, 'update']);
Route::delete('/Admin/a_siswa/{id}', [SiswaController::class, 'destroy']);
Route::get('/Admin/a_siswa/{id}', [SiswaController::class, 'show']);

// Route::view('/Admin/a_siswa','Admin/a_siswa');
Route::view('/Admin/a_guru','Admin/a_guru');
Route::view('/Admin/a_mapel','Admin/a_mapel');
Route::view('/Admin/a_kelas','Admin/a_kelas');

//========Tugas Guru=========
Route::get('/Guru/tugas', [TugasController::class, 'index']);
Route::get('/Guru/tugas/create', [TugasController::class, 'create']);
Route::post('/tugas', [TugasController::class, 'store'])->name('storeSiswaTugas');

//========Tugas Siswa=========
Route::get('/Siswa/tugas', [TugasController::class, 'indexs']);
Route::get('/Siswa/tugas/{id}', [TugasController::class, 'show']);