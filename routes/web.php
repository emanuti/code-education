<?php

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

/**
 * toda vez que vier id na rota eu valido se é um inteiro.
 */
Route::pattern('id', '[0-9]+');

Route::resource('category', 'CategoriesController');