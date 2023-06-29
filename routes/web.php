<?php

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

Route::get('/', [\App\Http\Controllers\CryptoController::class, 'index'])->name('crypto.list');
Route::get('/crypto/{id}', [\App\Http\Controllers\CryptoController::class, 'show'])->name('crypto.details');
