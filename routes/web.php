<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AboutController;

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

Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('/arsip-surat/create', [ArsipController::class, 'create'])->name('arsip.create');
Route::get('/arsip/{id}/show', [ArsipController::class, 'show'])->name('arsip.show');
Route::post('/arsip-surat', [ArsipController::class, 'store'])->name('arsip.store');
Route::get('/arsip/{id}/download', [ArsipController::class, 'download'])->name('arsip.download');
Route::delete('/arsip/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsip/{id}/edit', [ArsipController::class, 'edit'])->name('arsip.edit');
Route::put('/arsip/{id}', [ArsipController::class, 'update'])->name('arsip.update');



Route::get('/kategori-surat', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori-surat/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::get('/kategori-surat/{id_kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori-surat/{id_kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori-surat/{id_kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::post('/kategori-surat/store', [KategoriController::class, 'store'])->name('kategori.store');



Route::get('/about', [AboutController::class, 'index'])->name('about.index');
