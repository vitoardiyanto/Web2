<?php

use App\Http\Controllers\Contohcontroller;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contoh', [Contohcontroller::class, 'ViewContoh']);

//Route::get('/produk', function () {
    //return view('produk');
//});
route::get('/produk', [ProdukController::class, 'ViewProduk']);
route::get('/produk/add', [ProdukController::class, 'ViewAddProduk']);
route::POST('/produk/add', [ProdukController::class, 'CreateProduk']);
Route::delete('/produk/delete/{kode_produk}', [ProdukController::class, 'DeleteProduk']);
Route::get('/produk/edit/{kode_produk}', [ProdukController::class,'ViewEditProduk']);
Route::put('/produk/edit/{kode_produk}', [ProdukController::class,'UpdateProduk']);
