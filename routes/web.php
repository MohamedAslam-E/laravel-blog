<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
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
Route::get('/layout', [PostController::class, 'index']);
Route::post('/post', [PostController::class, 'store'])->name('post.store');
//category
Route::get('/category', [CategoryController::class, 'create'])->name('category.show');
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.indexx');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
//tags
Route::get('/tag/index', [TagController::class, 'index'])->name('tag.index');
Route::get('/tag/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
Route::get('/tag/create', [TagController::class, 'create'])->name('tag.show');
Route::put('/tag/update/{id}', [TagController::class, 'update'])->name('tag.update');
Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
Route::delete('/tag/delete/{id}', [TagController::class, 'delete'])->name('tag.delete');
