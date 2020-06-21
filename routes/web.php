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

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::resource('users', 'UsersController');
Route::get('/users/soft_delete/{id}', 'UsersController@soft_delete')->name('users.soft_delete');
Route::get('/logout', 'UsersController@logout')->name('logout');

Route::get('/revenue', 'SalesController@index')->name('sales');

Route::resource('clients', 'ClientsController');
Route::get('/clients/soft_delete/{id}', 'ClientsController@soft_delete')->name('clients.soft_delete');
Route::post('/clients/search', 'DashboardController@search_client')->name('search_client');

Route::get('/sales/clients', 'ClientsController@index')->name('clients_index');
Route::get('/sales/reports', 'SalesController@reports')->name('sales_report');
Route::post('/sales/sell', 'SalesController@insert_sale')->name('insert_sale');
Route::get('/sales/create/{id}', 'SalesController@create')->name('create_sales');
Route::get('/sales/bill/{id}', 'SalesController@bill_client')->name('bill_client');
Route::resource('sales', 'SalesController');

Route::get('/inventory', 'InventoryController@index')->name('inventory_dashboard');

Route::resource('suppliers', 'SuppliersController');
Route::get('/suppliers/soft_delete/{id}', 'SuppliersController@soft_delete')->name('suppliers.soft_delete');
Route::get('/purchases/suppliers', 'SuppliersController@index')->name('suppliers_index');

Route::resource('items', 'ItemsController');
Route::get('/items/soft_delete/{id}', 'ItemsController@soft_delete')->name('items.soft_delete');
Route::get('/purchases/items', 'ItemsController@index')->name('items_index');

Route::resource('purchases', 'PurchasesController');
Route::get('/purchases/soft_delete/{id}', 'PurchasesController@soft_delete')->name('purchases.soft_delete');
Route::post('/purchases/receive_purchase/{id}', 'PurchasesController@receive_purchase')->name('receive_purchase');


Route::resource('employees', 'EmployeesController');
Route::get('/employees/soft_delete/{id}', 'EmployeesController@soft_delete')->name('employees.soft_delete');

Route::get('/accounting/dashboard', 'AccountingController@index')->name('accounting_dashboard');


/* Report PDF */
Route::get('/sales/reports/print/monthly_sales_income', [ 'as' => 'sales_report.monthly_sales_income_print', 'uses' => 'SalesController@monthly_sales_income_print']);
Route::get('/inventory/reports/print/stock_count', [ 'as' => 'pdf_stock_count', 'uses' => 'InventoryController@stock_count_print_pdf']);

/* End of Report PDF */