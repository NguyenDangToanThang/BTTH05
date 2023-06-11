<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::resource('/category', CategoryController::class);
Route::get('/category' , [CategoryController::class , 'index'])->name('category.index');
Route::delete('category/{id}/destroy' , [CategoryController::class , 'destroy'])->name('category.destroy');
Route::get('/{id}/edit' , [CategoryController::class , 'edit'])->name('category.edit');

Route::get('/article' , [ArticleController::class , 'index'])->name('article.index');


