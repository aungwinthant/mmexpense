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

Route::get('/', function(){
    return view('index');
});



Auth::routes();

Route::resource('category','CategoryController');

//transactions
Route::get('transactions/history','TransactionController@getTransactionHistory')->name('history');
Route::get('/transactions/category/{category}/','TransactionController@getTransactionByCategory');
Route::resource('transactions','TransactionController');
//currency_exchange
Route::get('currency_exchange','CurrencyExchangeController@index')->name('currency_exchange');

//users
Route::get('users/{user}','UserController@show');
Route::post('users','UserController@update');