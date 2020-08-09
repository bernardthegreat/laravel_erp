<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class AnalyticsController extends Controller
{
  function analytics()
  {
    $report_analytics = array(
      'monthly_sales_report'=>'Monthly Sales Report',
      'sales_vs_purchases'=>'Sales Vs. Purchases',
      'item_costs_history'=>'Item Costs History'
    );
    return $report_analytics;
  }

  function index() 
  {
    $analytics_listings = $this->analytics();

    return view('analytics/index', compact('analytics_listings'));
  }

  function get_analytics_listing(Request $request) {
    
    $analytics_listings = $this->analytics();
    $analytics_selected = $request->analytics_id;
    $function = $request->analytics_id;
    $results = $this->$function(); 
    return view('analytics/index', compact('analytics_listings', 'analytics_selected', 'results'));
  }

  function monthly_sales_report()
  {
    $current_month = date('m');
    $current_year = date('Y');
    $lastday = sprintf("%02s",cal_days_in_month(CAL_GREGORIAN,$current_month,$current_year));
		$month = sprintf("%02s",$current_month);
    $start_date = '2020-06-01';
    // $start_date = date('Y-m-d', strtotime($current_year.'-'.$current_month.'-01'));
    $end_date = date('Y-m-d', strtotime($current_year.'-'.$current_month.'-'.$lastday));
    $sales = DB::select(DB::raw("SELECT * FROM sales_view where paid_on >= '$start_date' and paid_on <= '$end_date' "));
    return $sales;
  }

  function monthly_sales_report_print()
  {
    $result_print = $this->monthly_sales_report();
    $pdf = PDF::loadView('analytics/sales_pdf/monthly_sales_income', compact('result_print'));
    $pdf->setPaper('LETTER', 'landscape');
    return $pdf->stream('Sales.pdf');
  }

  function sales_vs_purchases()
  { 
    $current_month = date('m');
    $current_year = date('Y');
    $lastday = sprintf("%02s",cal_days_in_month(CAL_GREGORIAN,$current_month,$current_year));
		$month = sprintf("%02s",$current_month);
    // $start_date = '2020-06-01';
    $start_date = date('Y-m-d', strtotime($current_year.'-'.$current_month.'-01'));
    $end_date = date('Y-m-d', strtotime($current_year.'-'.$current_month.'-'.$lastday));

    $sales = DB::select(DB::raw("SELECT * FROM sales_vs_purchases_view where sale_date >= '$start_date' and sale_date <= '$end_date' "));
    return $sales;
  }

  function sales_vs_purchases_print()
  {
    $result_print = $this->sales_vs_purchases();
    $pdf = PDF::loadView('analytics/sales_pdf/sales_vs_purchases', compact('result_print'));
    $pdf->setPaper('LETTER', 'landscape');
    return $pdf->stream('Sales.pdf');
  }
}
