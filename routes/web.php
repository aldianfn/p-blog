<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.login_action');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/dashboard/users', [UserController::class, 'show'])->name('user.show');
    Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/dashboard/users/{user}', [UserController::class, 'update'])->name('user.update');

    Route::get('/dashboard/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/dashboard/posts', [PostController::class, 'store'])->name('post.store');

    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/dashboard/tags', [TagController::class, 'index'])->name('tag.index');
    Route::get('/dashboard/tags/create', [TagController::class, 'create'])->name('tag.create');
    // Route::post('/dashboard/tags', [TagController::class, 'store'])->name('tag.store');

    Route::get('/dashboard/profile', [UserController::class, 'index'])->name('user.profile');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});