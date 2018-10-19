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

Auth::routes();

Route::resources([
    'category' => 'CategoriesController',
    'product' => 'ProductsController',
]);

Route::get('product/{id}/images', 'ProductsController@indexImages')->name('product.images.index');
Route::get('product/{id}/images/create', 'ProductsController@createImage')->name('product.images.create');
Route::post('product/{id}/images', 'ProductsController@storeImage')->name('product.images.store');
Route::delete('product/image/{id}', 'ProductsController@destroyImage')->name('product.images.destroy');

Route::get('/home', 'HomeController@index')->name('home');

