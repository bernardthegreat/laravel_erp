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


/* Users */
Route::resource('users', 'UsersController');
Route::get('/users/soft_delete/{id}', 'UsersController@soft_delete')->name('users.soft_delete');
Route::post('/users/external_store', 'UsersController@external_store')->name('users.external_store');
Route::get('/logout', 'UsersController@logout')->name('logout');
/* Users */

/* Clients */
Route::resource('clients', 'ClientsController');
Route::get('/clients/soft_delete/{id}', 'ClientsController@soft_delete')->name('clients.soft_delete');
Route::post('/clients/search', 'DashboardController@search_client')->name('search_client');
Route::post('/clients/create', 'ClientsController@create')->name('clients.create');
/* Clients */

/* Sales */
Route::get('/revenue', 'SalesController@index')->name('sales');
Route::get('/sales/clients', 'ClientsController@index')->name('clients_index');
Route::get('/sales/reports', 'SalesController@reports')->name('sales_report');
Route::post('/sales/sell', 'SalesController@insert_sale')->name('insert_sale');
Route::get('/sales/payments', 'SalesController@get_payments')->name('payments');
Route::get('/sales/create/{id}', 'SalesController@create')->name('create_sales');
Route::post('/sales/process_payment/', 'SalesController@process_payment')->name('process_payment');
Route::get('/sales/bill/{id}', 'SalesController@generate_billing_statement')->name('generate_billing_statement');
Route::post('/sales/bill_client/{id}', 'SalesController@bill_client')->name('bill_client');
Route::get('/sales/print_bill/{id}', 'SalesController@print_billing_statement')->name('print_billing_statement');
Route::resource('sales', 'SalesController');
/* Sales */

Route::get('/inventory', 'InventoryController@index')->name('inventory_dashboard');

/* Suppliers */
Route::resource('suppliers', 'SuppliersController');
Route::get('/suppliers/soft_delete/{id}', 'SuppliersController@soft_delete')->name('suppliers.soft_delete');
Route::get('/purchases/suppliers', 'SuppliersController@index')->name('suppliers_index');
/* Suppliers */

/* Items */
Route::resource('items', 'ItemsController');
Route::get('/items/soft_delete/{id}', 'ItemsController@soft_delete')->name('items.soft_delete');
Route::get('/purchases/items', 'ItemsController@index')->name('items_index');
/* Items */

/* Interests */
Route::resource('interests', 'InterestsController');
Route::get('/interests/soft_delete/{id}', 'InterestsController@soft_delete')->name('interests.soft_delete');
/* Interests */

/* Purchases */
Route::resource('purchases', 'PurchasesController');
Route::get('/purchases/soft_delete/{id}', 'PurchasesController@soft_delete')->name('purchases.soft_delete');
Route::post('/purchases/receive_purchase/{id}', 'PurchasesController@receive_purchase')->name('receive_purchase');
Route::get('pending_deliveries', 'PurchasesController@pending_deliveries')->name('pending_deliveries');
/* Purchases */

/* Employees */
Route::resource('employees', 'EmployeesController');
Route::get('/employees/soft_delete/{id}', 'EmployeesController@soft_delete')->name('employees.soft_delete');
Route::post('/employees/time_in_and_out', 'EmployeesController@time_in_and_out')->name('time_in_and_out');
Route::post('/employees/process_payroll', 'EmployeesController@process_payroll')->name('process_payroll');
Route::get('/employees/payslip/{id}', 'EmployeesController@generate_latest_payslip')->name('generate_latest_payslip');
Route::get('/employees/get_payslip/{id}', 'EmployeesController@get_payslip')->name('get_payslip');
/* Employees */

/* Utilities */
Route::resource('utilities', 'UtilitiesController');
Route::get('/utilities/soft_delete/{id}', 'UtilitiesController@soft_delete')->name('utilities.soft_delete');
/* Utilities */

/* UtilityTypes */
Route::resource('utility_types', 'UtilityTypesController');
Route::get('/utility_types/soft_delete/{id}', 'UtilityTypesController@soft_delete')->name('utility_types.soft_delete');
/* Utilities */


Route::get('/accounting/dashboard', 'AccountingController@index')->name('accounting_dashboard');


Route::resource('analytics', 'AnalyticsController');

/* Report PDF */
Route::get('/sales/reports/print/monthly_sales_income', [ 'as' => 'sales_report.monthly_sales_income_print', 'uses' => 'SalesController@monthly_sales_income_print']);
Route::get('/inventory/reports/print/stock_count', [ 'as' => 'pdf_stock_count', 'uses' => 'InventoryController@stock_count_print_pdf']);

/* End of Report PDF */