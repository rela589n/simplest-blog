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
    ->name('dashboard')
    ->namespace('Dashboard')
    ->group(function () {

        Route::prefix('/categories')
            ->name('.categories')
            ->group(function () {

                Route::get('/create', 'CategoriesController@create')->name('.create');

                Route::get('/{category}/edit', 'CategoriesController@edit')->name('.edit');

                Route::put('/{category}', 'CategoriesController@update')->name('.update');

                Route::delete('/{category}', 'CategoriesController@destroy')->name('.destroy');

                Route::post('/', 'CategoriesController@store')->name('.store');

                Route::get('/', 'CategoriesController@index')->name('.index');
            });

        Route::prefix('/posts')
            ->name('.posts')
            ->group(function () {

                Route::get('/create', 'PostsController@create')->name('.create');

                Route::get('/{post}/edit', 'PostsController@edit')->name('.edit');

                Route::put('/{post}', 'PostsController@update')->name('.update');

                Route::delete('/{post}', 'PostsController@destroy')->name('.destroy');

                Route::post('/', 'PostsController@store')->name('.store');

                Route::get('/', 'PostsController@index')->name('.index');

            });

        Route::get('/', function () {
            return view('pages.dashboard.home');
        });
    });

Route::name('main')
    ->namespace('Main')
    ->group(function () {

        Route::prefix('/categories')
            ->name('.categories')
            ->group(function () {

                Route::get('/{category}', 'CategoriesController@show')->name('.show');

                Route::get('/', 'CategoriesController@index')->name('.index');

            });

        Route::prefix('/posts')
            ->name('.posts')
            ->group(function () {

                Route::get('/{post}', 'PostsController@show')->name('.show');

                Route::get('/', 'PostsController@index')->name('.index');

            });

    });
