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
Route::resource('loading-hire-agreements','\\App\\Http\\Controllers\\Transactions\\LHA\\LoadingHireAgreementsController');
Route::resource('loading-hire-agreements/{loading_hire_agreement}/approvals', '\\App\\Http\\Controllers\\Transactions\\LHA\\LHAsApprovalController');
Route::PATCH('loading-hire-agreements/{loading_hire_agreement}/timestamps', '\\App\\Http\\Controllers\\Transactions\\LHA\\LHATimestampsController@store');
Route::post('loading-hire-agreements/{loading_hire_agreement}/driver-owner-details', '\\App\\Http\\Controllers\\Transactions\\LHA\\LHAOwnerDriverDetailsController@store');

Route::resource('transactions/{transaction}/default-lha','\\App\\Http\\Controllers\\Transactions\\LHA\\DefaultLHAController');

Route::resource('goods-consignment-notes','\\App\\Http\\Controllers\\Transactions\\GC\\GoodsConsignmentNotesController');
Route::resource('goods-consignment-notes/{goodsConsignmentNote}/approvals','\\App\\Http\\Controllers\\Transactions\\GC\\GCsApprovalController');

Route::resource('/customers','\\App\\Http\\Controllers\\Masters\\Customers\\CustomersController');
Route::resource('/customers/{customer}/contracts','\\App\\Http\\Controllers\\Masters\\Customers\\CustomerContractsController');

Route::resource('/contracts/{contract}/routes', '\\App\\Http\\Controllers\\Masters\\Customers\\ContractRouteController');
Route::resource('/routes/{route}/billing-rates','\\App\\Http\\Controllers\\Masters\\Customers\\RouteBillingRatesController');

Route::resource('/fleetomata/trucks','\\App\\Http\\Controllers\\Fleetomata\\Trucks\\TrucksController');
Route::resource('/fleetomata/trips','\\App\\Http\\Controllers\\Fleetomata\\Trips\\TripsController');
 Route::resource('/fleetomata/trips/{trip}/orders','\\App\\Http\\Controllers\\Fleetomata\\Orders\\OrdersController');
