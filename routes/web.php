<?php

use Illuminate\Support\Facades\Route;
use Modules\pkgProduit\Controllers\ProduitController;

Route::get('/', [ProduitController::class,'index'])->name('index');
Route::resource('products', ProduitController::class);
Route::get('dashboard', [ProduitController::class, 'evaluate']);
