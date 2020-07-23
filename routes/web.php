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


Route::resource('/users','\\App\\Http\\Controllers\\Masters\\Users\\UsersController');
Route::resource('/truck-types','\\App\\Http\\Controllers\\Masters\\TruckType\\TruckTypesController');
Route::resource('/branches','\\App\\Http\\Controllers\\Masters\\Branches\\BranchesController');

Route::resource('/customers','\\App\\Http\\Controllers\\Masters\\Customers\\CustomersController');
