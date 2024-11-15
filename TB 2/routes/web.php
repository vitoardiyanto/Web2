<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('component.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'user-access:user'])->prefix('user')->group(function () {
    //Home Controller
    Route::get('/home', [HomeController::class, 'index']);
    //Product Controller
    Route::resource('produk', ProductController::class);

    Route::get('/produk/{kode_produk}/edit', [ProductController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{kode_produk}', [ProductController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{kode_produk}', [ProductController::class, 'destroy'])->name('produk.destroy');

    Route::get('/inputProduk', [ProductController::class, 'create']);
    Route::get('/laporan', [ProductController::class, 'ViewLaporan']);
    Route::get('/report', [ProductController::class, 'print']);
});

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    //Home Controller
    Route::get('/home', [HomeController::class, 'index']);

    //Product Controller
    Route::resource('produk', ProductController::class);
    Route::get('/produk/{kode_produk}/edit', [ProductController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{kode_produk}', [ProductController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{kode_produk}', [ProductController::class, 'destroy'])->name('produk.destroy');

    Route::get('/inputProduk', [ProductController::class, 'create']);
    Route::get('/laporan', [ProductController::class, 'ViewLaporan']);
    Route::get('/report', [ProductController::class, 'print']);
});
