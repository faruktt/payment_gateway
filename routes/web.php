<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TranslatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('fontend.fontend');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
  Route::get('/admin', [AdminController::class, 'admin']);

  Route::resource('category', CategoryController::class);
  route::get('/category/activate/{id}',[CategoryController::class, 'active'])->name('category.active');
  route::get('/category/deactivate/{id}',[CategoryController::class, 'deactive'])->name('category.deactive');

  Route::resource('product', ProductController::class);
  route::get('/product/activate/{id}',[ProductController::class, 'active'])->name('product.active');
  route::get('/product/deactivate/{id}',[ProductController::class, 'deactive'])->name('product.deactive');


  Route::get('/translator', [TranslatorController::class, 'index'])->name('tr.d');
  Route::post('/translator', [TranslatorController::class, 'translate'])->name('translator.translate');

require __DIR__.'/auth.php';
