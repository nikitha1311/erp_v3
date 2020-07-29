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

// Auth Routes
Route::get('login', '\\App\\Http\\Controllers\\Auth\\LoginController@showLoginForm')->name('login');

Route::get('/', 'DashboardController@index')->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/users','\\App\\Http\\Controllers\\Masters\\Users\\UsersController');
Route::resource('/truck-types','\\App\\Http\\Controllers\\Masters\\TruckType\\TruckTypesController');
Route::resource('/branches','\\App\\Http\\Controllers\\Masters\\Branches\\BranchesController');
Route::resource('/vendors','\\App\\Http\\Controllers\\Masters\\Vendors\\VendorsController');
Route::resource('/locations','\\App\\Http\\Controllers\\Masters\\Locations\\LocationsController');

Route::resource('/transactions','\\App\\Http\\Controllers\\Transactions\\TransactionsController');

Route::resource('/customers','\\App\\Http\\Controllers\\Masters\\Customers\\CustomersController');
Route::resource('/customers/{customer}/contracts','\\App\\Http\\Controllers\\Masters\\Customers\\CustomerContractsController');

Route::resource('/contracts/{contract}/routes', '\\App\\Http\\Controllers\\Masters\\Customers\\ContractRouteController');
Route::resource('/routes/{route}/billing-rates','\\App\\Http\\Controllers\\Masters\\Customers\\RouteBillingRatesController');
