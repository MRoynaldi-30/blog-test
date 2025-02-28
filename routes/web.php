<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginShow'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/account', [AdminController::class, 'createAccount'])->name('admin.account.create');
Route::get('/admin/account', [AdminController::class, 'kelolaAkun'])->name('admin.user');

Route::get('/admin/account/edit/{id}', [AdminController::class, 'editAccount'])->name('admin.account.edit');
Route::put('/admin/account/update', [AdminController::class, 'updateAccount'])->name('admin.account.update');

Route::get('/admin/account/delete/{id}', [AdminController::class, 'deleteAccount'])->name('admin.account.delete');

Route::get('/admin/post', [AdminController::class, 'post'])->name('admin.post');
Route::post('/admin/post', [AdminController::class, 'createPost'])->name('admin.post.create');

Route::get('/admin/post/edit/{idpost}', [AdminController::class, 'editPost'])->name('admin.post.edit');
Route::put('/admin/post/update/{idpost}', [AdminController::class, 'updatePost'])->name('admin.post.update');


Route::get('/author', [AuthorController::class, 'index'])->name('author.dashboard');