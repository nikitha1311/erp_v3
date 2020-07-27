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

Route::get('/', 'DashboardController@index')->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('users','\\App\\Http\\Controllers\\Masters\\Users\\UsersController');

Route::resource('/customers','\\App\\Http\\Controllers\\Masters\\Customers\\CustomersController');
Route::resource('/customers/{customer}/contracts','\\App\\Http\\Controllers\\Masters\\Customers\\CustomerContractsController');
