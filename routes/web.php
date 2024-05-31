<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengacaraController;
use App\Http\Controllers\Portal\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',                     [PengacaraController::class, 'showIndex'])->name('showIndex');
Route::get('/search',               [PengacaraController::class, 'search'])->name('search');

Route::get('/login',                    [AuthController::class, 'showLogin'])->name('showLogin');
Route::get('/register',                 [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('submit-form-daftar',       [AuthController::class, 'submitFormDaftar'])->name('submitFormDaftar');
// getData
Route::get('/provinces',            [AuthController::class, 'getProvinces'])->name('getProvinces');
Route::get('/regencies',            [AuthController::class, 'getRegencies'])->name('getRegencies');
Route::get('/districts',            [AuthController::class, 'getDistricts'])->name('getDistricts');
Route::get('/villages',             [AuthController::class, 'getVillages'])->name('getVillages');
