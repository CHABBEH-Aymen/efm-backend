<?php

use Illuminate\Support\Facades\Route;
use Modules\pkgProduit\Controllers\ProduitController;

Route::get('/', [ProduitController::class,'index'])->name('index');
