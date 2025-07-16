<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori', 'GetKategori');
    Route::get('/tambah', 'viewTambah');
    Route::post('/tambah-data', 'TambahData');
    Route::get('/update/{id}', 'viewUpdate');
    Route::post('/update-data', 'UpdateData');
    Route::get('/delete/{id}', 'Delete');
});

Route::controller(BukuController::class)->group(function () {
    Route::get('/books', 'getBuku');
    Route::get('/tambah-buku', 'viewTambah');
    Route::post('/post-tambah-buku', 'TambahBuku');
    Route::get('/update-buku/{id}', 'viewUpdate');
    Route::post('/post-update-buku', 'UpdateBuku');
    Route::get('/delete-buku/{id}', 'deleteBuku');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'users');
    Route::get('/view-add', 'viewTambah');
    Route::post('/post-add', 'postAdd');
    Route::get('/view-update/{id}', 'viewEdit');
    Route::post('/post-update', 'postEdit');
    Route::get('/delete-user/{id}', 'deleteUser');
});

Route::get('/login',[AuthController::class,'loginView']);
Route::post('/login-post',[AuthController::class,'postLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard',[DashboardController::class,'dashboard']);