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
Route::get('/sales/delete/{id}', 'SalesController@delete')->name('sales.delete');
Route::post('/sales/process_payment/', 'SalesController@process_payment')->name('process_payment');
Route::get('/sales/bill/{id}', 'SalesController@generate_billing_statement')->name('generate_billing_statement');
Route::post('/sales/bill_client/{id}', 'SalesController@bill_client')->name('bill_client');
Route::get('/sales/print_bill/{id}', 'SalesController@print_billing_statement')->name('print_billing_statement');
Route::get('/sales/print_soa/{id}', 'SalesController@statement_of_account_print')->name('statement_of_account_print');
Route::get('/sales/point_of_sale/', 'SalesController@point_of_sale')->name('point_of_sale');
Route::get('/sales/sales_ordering/{id}', 'SalesController@sales_ordering')->name('sales_ordering');
Route::post('/sales/submit_pos_order/', 'SalesController@submit_pos_order')->name('submit_pos_order');

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
Route::get('/purchases/delete/{id}', 'PurchasesController@delete')->name('purchases.delete');
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
Route::post('/employees/add_salary_rates/{id}', 'EmployeesController@add_salary_rates')->name('employees.add_salary_rates');
Route::get('/employees/edit_salary_rates/{id}', 'EmployeesController@edit_salary_rates')->name('employees.edit_salary_rates');
Route::post('/employees/update_salary_rate/{id}', 'EmployeesController@update_salary_rate')->name('employees.update_salary_rate');

Route::get('/employees/payroll_delete/{id}', 'EmployeesController@payroll_delete')->name('employees.payroll_delete');
Route::get('/employees/payroll_edit/{id}', 'EmployeesController@payroll_edit')->name('employees.payroll_edit');
Route::post('/employees/payroll_update/{id}', 'EmployeesController@payroll_update')->name('employees.payroll_update');

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

Route::get('/analytics', 'AnalyticsController@index')->name('analytics.index');
Route::post('/analytics/get_analytics', 'AnalyticsController@get_analytics_listing')->name('get_analytics_listing');
Route::get('/analytics/monthly_sales_report_print/{id}', 'AnalyticsController@monthly_sales_report_print')->name('monthly_sales_report_print');
Route::get('/analytics/purchases_vs_sales_print/{id}', 'AnalyticsController@purchases_vs_sales_print')->name('purchases_vs_sales_print');
Route::get('/analytics/monthly_utilities_print/{id}', 'AnalyticsController@monthly_utilities_print')->name('monthly_utilities_print');
Route::get('/analytics/sales_vs_purchases_print/{id}', 'AnalyticsController@sales_vs_purchases_print')->name('sales_vs_purchases_print');
Route::get('/analytics/item_costs_history_print', 'AnalyticsController@item_costs_history_print')->name('item_costs_history_print');

/* Report PDF */
Route::get('/sales/reports/print/monthly_sales_income/{id}', [ 'as' => 'sales_report.monthly_sales_income_print', 'uses' => 'SalesController@monthly_sales_report_print']);
Route::get('/inventory/reports/print/stock_count', [ 'as' => 'pdf_stock_count', 'uses' => 'InventoryController@stock_count_print_pdf']);

/* End of Report PDF */