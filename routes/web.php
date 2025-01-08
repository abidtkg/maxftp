<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MovieController;
use App\Http\Controllers\WebpageController;
use App\Http\Middleware\AdminGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [WebpageController::class, 'index'])->name('web.index');
Route::get('/movie/{id}', [WebpageController::class, 'movie_page'])->name('web.movie');
Route::get('/request-movie', [WebpageController::class, 'request_movie_page'])->name('web.requestmovie');
Route::post('/request-movie/store', [WebpageController::class, 'request_movie_store'])->name('web.requestmovie.store');
Route::get('/home', [WebpageController::class, 'home'])->name('home');

Route::prefix('/admin')->name('admin.')->middleware([AdminGuard::class])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/movies', [MovieController::class, 'index'])->name('movie.index');
    Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
    Route::post('/movie/store', [MovieController::class, 'store'])->name('movie.store');
    Route::get('/movie/delete/{id}', [MovieController::class, 'delete'])->name('movie.delete');

    // CATEGORY
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});