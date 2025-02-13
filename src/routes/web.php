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

Route::get('/products/register', [ProductController::class, 'register'])->name('products.register');

// 商品一覧ページ
Route::get('/products', [ProductController::class, 'index']);

//商品詳細（表示用）
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

//編集画面（update.blade.php を表示）
Route::get('/products/{id}/update', [ProductController::class, 'update'])->name('products.edit');

// 商品更新処理（データベース更新用）
Route::patch('/products/{id}/update', [ProductController::class, 'saveUpdate'])->name('products.saveUpdate');

