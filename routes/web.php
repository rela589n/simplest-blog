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
    ->middleware('auth')
    ->group(function () {

        Route::resource('categories', 'CategoriesController')
            ->only(['create', 'edit', 'update', 'destroy', 'store', 'index']);

        Route::get('categories/own', 'CategoriesController@own')
            ->name('categories.own');

        Route::resource('posts', 'PostsController')
            ->only(['create', 'edit', 'update', 'destroy', 'store', 'index']);

        Route::get('posts/own', 'PostsController@own')
            ->name('posts.own');

        Route::view('/', 'pages.dashboard.home')->name('home');
    });

Route::name('main.')
    ->namespace('Main')
    ->group(function () {

        Route::resource('categories', 'CategoriesController')
            ->only(['show', 'index'])
            ->parameters(['categories' => 'category:uri_alias']);

        Route::resource('posts', 'PostsController')
            ->only(['show', 'index'])
            ->parameters(['posts' => 'post:uri_alias']);

        Route::redirect('/', '/posts')->name('home');
    });

Route::prefix('/api')
    ->name('api.')
    ->namespace('API')
    ->middleware('auth')
    ->group(function () {

        Route::apiResource('comments', 'CommentsController')
            ->only('store');

    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
