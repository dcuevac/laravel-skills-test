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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/products/stock/create', 'ProductStocksController@create')->name('product.stock.create');
    Route::get('/products/stock', 'ProductStocksController@index')->name('product.stock.index');
    Route::post('/products/stock/store', 'ProductStocksController@store')->name('product.stock.store');
});

Auth::routes();
