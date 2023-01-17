<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KueController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kue', [HomeController::class, 'kue']);
Route::get('/kue/favorit', [HomeController::class, 'favorit']);
Route::get('/kue/terbaru', [HomeController::class, 'terbaru']);
Route::get('/kue/jenis/{id}', [HomeController::class, 'jenis']);

Route::post('/daftar', [UserController::class, 'daftar']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/pembelian/{id}', [HomeController::class, 'pembelian']);
Route::post('/pesan-kue/{id}', [PemesananController::class, 'pesan']);

Route::get('/keranjang', [PemesananController::class, 'keranjang']);
Route::post('/bayar/{id}', [PemesananController::class, 'bayar']);

Route::post('/testimoni/{id}', [TestimoniController::class, 'input']);

Route::get('/admin', [PemesananController::class, 'data']);
Route::get('/admin/data-kue', [KueController::class, 'data'])->middleware('auth')->middleware('admin');
Route::get('/admin/delete-kue/{id}', [KueController::class, 'delete'])->middleware('auth')->middleware('admin');
Route::post('/admin/input-kue', [KueController::class, 'input'])->middleware('auth')->middleware('admin');
Route::post('/admin/edit-kue/{id}', [KueController::class, 'edit'])->middleware('auth')->middleware('admin');
Route::post('/admin/edit-status/{id}', [PemesananController::class, 'update'])->middleware('auth')->middleware('admin');
