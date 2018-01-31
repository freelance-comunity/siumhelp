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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
    Route::resource('admin/bank', 'Admin\\BankController');
    Route::get('admin/bank/addVar/{id}', 'Admin\\BankController@addVar')->name('bank.addVar');
    Route::get('admin/layout', 'Admin\\BankController@layout')->name('bank.layout');
    Route::post('admin/layout', 'Admin\\BankController@processLayout')->name('process.layout');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/variable', 'Admin\\VariableController');
});