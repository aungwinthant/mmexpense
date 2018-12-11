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

Route::get('/', 'CurrencyExchangeController@index');



Auth::routes();

Route::get('/home', 'TransactionController@index')->name('home');

Route::get('/transactions','TransactionController@index');


