<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
//Route::post('/post-request', [UserController::class, 'postRequest'])->name('postRequest');
//Route::get('/tambah-product', [UserController::class, 'handleRequest'])->name('form_product');
//Route::get('/products', [UserController::class, 'getProduct'])->name('get_product');
//Route::get('/product/{product}', [UserController::class, 'editProduct'])->name('edit_product');
//Route::put('/product/{product}/update', [UserController::class, 'updateProduct'])->name('update_product');
//Route::post('/product/{product}/delete', [UserController::class, 'deleteProduct'])->name('delete_product');
//Route::get('/profile', [UserController::class, 'getProfile'])->name('get_profile');

//Route::get('/admin/list-products', [UserController::class, 'getAdmin'])->name('admin_page');

//Route::get('/cafe-amandemy', [UserController::class, 'cafe']);

Route::post('/{user}/post-request', [UserController::class, 'postRequest'])->name('postRequest');
Route::get('/{user}/tambah-product', [UserController::class, 'handleRequest'])->name('form_product');
Route::get('/products', [UserController::class, 'getProduct'])->name('get_product');
Route::get('/{user}/product/{product}', [UserController::class, 'editProduct'])->name('edit_product');
Route::put('/{user}/product/{product}/update', [UserController::class, 'updateProduct'])->name('update_product');
Route::post('/{user}/product/{product}/delete', [UserController::class, 'deleteProduct'])->name('delete_product');
Route::get('/profile/{user}', [UserController::class, 'getProfile'])->name('get_profile');

Route::get('/admin/{user}/list-products', [UserController::class, 'getAdmin'])->name('admin_page');

Route::get('/cafe-amandemy', [UserController::class, 'cafe']);

// Route::post('/posts/{post}/delete', [PostController::class, 'delete']);

