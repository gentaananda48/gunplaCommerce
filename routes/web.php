<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
//use App\Http\Controllers\HomeController;
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



Auth::routes(['register'=>false]);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('products/{id}/gallery', [ProductController::class, 'gallery'])->name('products.gallery');

Route::resource('products', ProductController::class);
// Hint resource products0
//Route get => products => index
//Route get => products/create => create
//Route post => products => store
//Route get => products/{id} => show
//Route put/patch => products/{id} => update
//Route delete => products/{id} => delete
//Route get => products/{id}/edit => edit

Route::resource('transaction', TransactionController::class);

Route::get('transaction/{id}/set-status', [TransactionController::class, 'setStatus'])->name('transaction.status');

Route::resource('product-galleries', ProductGalleryController::class);


