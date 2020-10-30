<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class AnalyticsController extends Controller
{
  private $fromDate;
  private $toDate;
  public function __construct()
  {
    $this->middleware('auth');
  }
  function analytics()
  {
    $report_analytics = array(
      'monthly_sales_report'=>'Monthly Sales Report',
      'purchases_vs_sales'=>'Purchases Vs. Sales',
      'item_costs_history'=>'Item Costs History',
      'monthly_utilities'=>'Monthly Utilities'
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
    $function_print = $request->analytics_id_print;
    
    $analytics_date = $request->analytics_from_and_to_date;
    $splitted_analytics_date = explode(' - ', $analytics_date);
    $from_date = date('Y-m-d', strtotime($splitted_analytics_date[0]));
    $to_date = date('Y-m-d', strtotime($splitted_analytics_date[1]));
    $print_request = $request->print_request;
    $results = $this->$function($from_date, $to_date); 

    $this->fromDate = $from_date;
    $this->toDate = $to_date;
    
    return view('analytics/index', compact('analytics_listings', 'analytics_selected', 'results'));
  }
  
  function setDates() {
    $dateArray = array($this->fromDate, $this->toDate);
    $inclusive_dates = implode("-", $dateArray);
    return $inclusive_dates;
  }

  function monthly_sales_report($from_date, $to_date)
  {
    // $current_month = date('m');
    // $current_year = date('Y');
    // $lastday = sprintf("%02s",cal_days_in_month(CAL_GREGORIAN,$current_month,$current_year));
		// $month = sprintf("%02s",$current_month);
    // $start_date = '2020-06-01';
    // $start_date = date('Y-m-d', strtotime($current_year.'-'.$current_month.'-01'));
    // $end_date = date('Y-m-d', strtotime($current_year.'-'.$current_month.'-'.$lastday));
    $sales = DB::select(DB::raw("SELECT * FROM sales_view where paid_on >= '$from_date' and paid_on <= '$to_date' "));  
    return $sales;
  }

  function monthly_sales_report_print ($date)
  {
    $inclusive_dates = explode("&", $date);
    $from_date_final =  date('Y-m-d', strtotime($inclusive_dates[0]));
    $to_date_final =  date('Y-m-d', strtotime($inclusive_dates[1]));
    
    $result_print = $this->monthly_sales_report($from_date_final, $to_date_final);
    $pdf = PDF::loadView('analytics/sales_pdf/monthly_sales_income', compact('result_print'));
    $pdf->setPaper('LETTER', 'landscape');
    return $pdf->stream('Sales.pdf');
  }

  function purchases_vs_sales($from_date, $to_date)
  { 
    $sales = DB::select(DB::raw("SELECT * FROM purchases_vs_sales_view where purchase_date >= '$from_date' and purchase_date <= '$to_date' "));
    return $sales;
  }

  function purchases_vs_sales_print($date)
  {
    $inclusive_dates = explode("&", $date);
    $from_date_final =  date('Y-m-d', strtotime($inclusive_dates[0]));
    $to_date_final =  date('Y-m-d', strtotime($inclusive_dates[1]));
    
    $result_print = $this->purchases_vs_sales($from_date_final, $to_date_final);
    $pdf = PDF::loadView('analytics/sales_pdf/purchases_vs_sales', compact('result_print'));
    $pdf->setPaper('LETTER', 'landscape');
    return $pdf->stream('Sales.pdf');
  }

  function monthly_utilities($from_date, $to_date)
  { 
    $utilities = DB::select(DB::raw("SELECT 
        name_long AS utility, 
        cost AS cost, 
        coverage AS coverage
      FROM
        utilities u
            JOIN
        utility_types ut ON ut.id = u.utility_type_id 
      where coverage >= '$from_date' and coverage <= '$to_date' "));

    return $utilities;
  }

  function monthly_utilities_print($date)
  {
    $inclusive_dates = explode("&", $date);
    $from_date_final =  date('Y-m-d', strtotime($inclusive_dates[0]));
    $to_date_final =  date('Y-m-d', strtotime($inclusive_dates[1]));
    
    $result_print = $this->monthly_utilities($from_date_final, $to_date_final);
    $pdf = PDF::loadView('analytics/utilities_pdf/monthly_utilities', compact('result_print'));
    $pdf->setPaper('LETTER', 'landscape');
    return $pdf->stream('Utilities.pdf');
  }

  function item_costs_history()
  { 
    // $current_month = date('m');
    // $current_year = date('Y');
    // $lastday = sprintf("%02s",cal_days_in_month(CAL_GREGORIAN,$current_month,$current_year));
		// $month = sprintf("%02s",$current_month);
    // // $start_date = '2020-06-01';
    // $start_date = date('Y-m-d', strtotime($current_year.'-'.$current_month.'-01'));
    // $end_date = date('Y-m-d', strtotime($current_year.'-'.$current_month.'-'.$lastday));
    $items = DB::select(DB::raw("SELECT * FROM item_costs_history_view"));
    return $items;
  }

  function item_costs_history_print()
  {
    $result_print = $this->item_costs_history();
    $pdf = PDF::loadView('analytics/sales_pdf/item_costs_history', compact('result_print'));
    $pdf->setPaper('LETTER', 'landscape');
    return $pdf->stream('Item Cost History.pdf');
  }
}
