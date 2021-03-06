<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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



/* The following routes interact with categories. */
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/admin/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');


/* The following route interacts with products. This route alone handles all the operations above. */
Route::resource('/admin/products', ProductController::class);


Route::get('/', [ProductController::class, 'displayGrid']);

