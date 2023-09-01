<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tagController;
use App\Http\Controllers\postController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\dashboardController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
//post
Route::get('/layout', [dashboardController::class, 'index']);
Route::post('/post', [dashboardController::class, 'store'])->name('post.store');
//category
Route::get('/category', [categoryController::class, 'show'])->name('category.show');
Route::get('/category/index', [categoryController::class, 'index'])->name('category.indexx');
Route::post('/category/store', [categoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [categoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [categoryController::class, 'update'])->name('category.update');
Route::delete('/category/delete/{id}', [categoryController::class, 'delete'])->name('category.delete');
//tags
Route::get('/tag/index', [tagController::class, 'index'])->name('tag.index');
Route::get('/tag/edit/{id}', [tagController::class, 'edit'])->name('tag.edit');
Route::get('/tag/show', [tagController::class, 'show'])->name('tag.show');
Route::put('/tag/update/{id}', [tagController::class, 'update'])->name('tag.update');
Route::post('/tag/store', [tagController::class, 'store'])->name('tag.store');
Route::delete('/tag/delete/{id}', [tagController::class, 'delete'])->name('tag.delete');
