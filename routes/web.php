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

                Route::get('/create', function (){
                    return 'create';
                })->name('.create');

                Route::get('/', function () {
                    return 'index';
                })->name('.index');
            });

        Route::prefix('/posts')
            ->name('.posts')
            ->group(function () {

                Route::get('/create', function (){
                    return 'create';
                })->name('.create');

                Route::get('/', function () {
                    return 'index';
                })->name('.index');
            });

        Route::get('/', function () {
            return view('pages.dashboard.home');
        });
    });
