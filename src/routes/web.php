<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/register', [ProductController::class, 'register'])->name('products.register');

Route::post('/products/register', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/search',  [ProductController::class, 'search'])->name('products.search');

Route::get('/products/{id}/', [ProductController::class, 'show'])->name('products.show');

Route::get('/products/{id}/update', [ProductController::class, 'update'])->name('products.edit');

Route::patch('/products/{id}/update', [ProductController::class, 'saveUpdate'])->name('products.update');

Route::delete('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.delete');