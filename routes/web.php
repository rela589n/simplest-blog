<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/dashboard')
    ->name('dashboard.')
    ->namespace('Dashboard')
    ->group(function () {

        Route::resource('categories', 'CategoriesController')
            ->only(['create', 'edit', 'update', 'destroy', 'store', 'index']);

        Route::resource('posts', 'PostsController')
            ->only(['create', 'edit', 'update', 'destroy', 'store', 'index']);

        Route::view('/', 'pages.dashboard.home')->name('home');
    });

Route::name('main.')
    ->namespace('Main')
    ->group(function () {

        Route::resource('categories', 'CategoriesController')
            ->only(['show', 'index']);

        Route::resource('posts', 'PostsController')
            ->only(['show', 'index']);

        Route::redirect('/', '/posts')->name('home');
    });
