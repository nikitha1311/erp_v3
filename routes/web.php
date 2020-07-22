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

Route::get('/', function () {
    return view('layouts.app1');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users','\\App\\Http\\Controllers\\Masters\\Users\\UsersController@index')->name('users.index');
Route::get('/users/create','\\App\\Http\\Controllers\\Masters\\Users\\UsersController@create');
Route::post('/users','\\App\\Http\\Controllers\\Masters\\Users\\UsersController@store');
Route::get('/users/{user}','\\App\\Http\\Controllers\\Masters\\Users\\UsersController@show');
Route::get('/users/{user}/edit','\\App\\Http\\Controllers\\Masters\\Users\\UsersController@edit');
Route::PATCH('/users/{user}','\\App\\Http\\Controllers\\Masters\\Users\\UsersController@update')->name('users.update');

Route::resource('/customers','\\App\\Http\\Controllers\\Masters\\Customers\\CustomersController');
