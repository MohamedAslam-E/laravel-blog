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
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::get('/post/show',[PostController::class,'show'])->name('post.show');

//category

// Route::get('/category', [CategoryController::class, 'create'])->name('category.create');
// Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
// Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
// Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
// Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
// Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::resource('/category',CategoryController::class);

//tags

// Route::get('/tag/index', [TagController::class, 'index'])->name('tag.index');
// Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
// Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
// Route::get('/tag/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
// Route::put('/tag/update/{id}', [TagController::class, 'update'])->name('tag.update');
// Route::delete('/tag/delete/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

Route::resource('/tag',TagController::class);

