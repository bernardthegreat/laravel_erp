<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use PDF;
use App\Item;
use App\Client;
use App\Sale;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $sales = DB::table('sales')
                        ->join('clients', 'clients.id', '=', 'sales.client_id')
                        ->join('purchases', 'purchases.id', '=', 'sales.purchase_id')
                        ->join('items', 'items.id', '=', 'purchases.item_id')
                        ->select(
                                'sales.id as id',
                                'clients.name_long as client_name', 
                                'items.name_long as item_name',
                                'sales.invoice_no as invoice_no',
                                'sales.dr_no as dr_no',
                                'sales.client_id as client_id', 
                                'sales.cost as cost',
                                'sales.qty as qty',
                                'sales.created_at as created_at'
                        )->get();

        $items = DB::select(DB::raw(
            "select * from stock_qty_fast_view"
        ));

        $clients = Client::all()->where('remarks', '!=', 'active');
                
        
        return view('sales/index', compact('sales', 'items', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        //$items = Item::all()->where('remarks', '!=', 'active');

        $items = DB::select(DB::raw(
            "select * from stock_qty_fast_view"
        ));
        
        $client = Client::all()->where('id', $id);



        return view('sales/create', compact('items', 'client'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert_sale(Request $request)
    {
        //
        $client_id = $request->client_id;
        $item_id = $request->item_id;
        $order_qty = $request->order_qty;
        $discount = $request->discount;
        $additional_fee = $request->additional_fee;
        $dr_no = $request->dr_no;
        $invoice_no = $request->invoice_no;
        $user_id = $request->user_id;
        $remarks = $request->remarks;

        $insert_sale = DB::select('call insert_sale(?,?,?,?,?,?,?,?,?, @sale)',
            array(
                $client_id, 
                $item_id,
                $dr_no,
                $invoice_no,
                $order_qty,
                $discount,
                $additional_fee,
                $user_id,
                $remarks
            )
        );
        $select_error_code = DB::select('select @sale as error_code');
        
        switch ($select_error_code[0]->error_code) {
            case 1:
                return redirect()->back()->with('error', 'Unable to sold the item: Insufficient Stocks');
                break;
            case 2:
                return redirect()->back()->with('error', 'Unable to sold the item: Invalid Client');
                break;
            case 3:
                return redirect()->back()->with('error', 'Unable to sold the item: Invalid Item');
                break;
            case 4:
                return redirect()->back()->with('error', 'Unable to sold the item: Invalid Order Quantity');
                break;
            case 5:
                return redirect()->back()->with('error', 'Unable to sold the item: Invalid User');
                break;
            case 6:
                return redirect()->back()->with('error', 'Unable to sold the item: Database Error');
                break;
            default:
                return redirect('/revenue')->with('success', 'Successfully sold');
                break;
        }
    }

    public function generate_billing_statement($id)
    {
        //
        $clients = Client::findOrFail($id);

        $break_downs = DB::select(DB::raw(
            "SELECT 
                _s.cost,
                _s.qty,
                _i.name_long,
                _s.addl_fee,
                _s.discount,
                _s.created_at,
                _s.invoice_no,
                _s.dr_no
            FROM
                sales _s
                    JOIN
                purchases _p ON _p.id = _s.purchase_id
                    JOIN
                items _i ON _i.id = _p.item_id
            WHERE
                _s.client_id = $id"));
        //dd($break_down);
        return view('sales/bill_client', compact('clients', 'break_downs'));
    }

    public function print_billing_statement($id)
    {
        //
        $clients = Client::findOrFail($id);

        $break_downs = DB::select(DB::raw(
            "SELECT 
                _s.cost,
                _s.qty,
                _i.name_long,
                _s.addl_fee,
                _s.discount,
                _s.created_at,
                _s.invoice_no,
                _s.dr_no
            FROM
                sales _s
                    JOIN
                purchases _p ON _p.id = _s.purchase_id
                    JOIN
                items _i ON _i.id = _p.item_id
            WHERE
                _s.client_id = $id"));
        //dd($break_down);
        $pdf = PDF::loadView('sales/billing_statement_print', compact('clients', 'break_downs') );  
        $pdf->setPaper('LETTER', 'landscape'); 
        return $pdf->stream('Billing Statement.pdf');
    }


    public function show($id)
    {
        //

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_payments()
    {
        //
        $sales = DB::table('sales')
                ->join('clients', 'clients.id', '=', 'sales.client_id')
                ->join('purchases', 'purchases.id', '=', 'sales.purchase_id')
                ->join('items', 'items.id', '=', 'purchases.item_id')
                ->groupByRaw('sales.dr_no')
                ->select(
                        'sales.id as id',
                        'clients.name_long as client_name', 
                        'items.name_long as item_name',
                        'sales.invoice_no as invoice_no',
                        'sales.dr_no as dr_no',
                        'sales.client_id as client_id', 
                        'sales.cost as cost',
                        'sales.qty as qty',
                        'sales.created_at as created_at',
                        'sales.paid_on'
                )->get();

        
        return view('sales/payments', compact('sales'));
    }

    public function process_payment(Request $request)
    {

        $paid_on = date('Y-m-d H:i:s', strtotime($request->paid_on));
        Sale::where(
            'dr_no', $request->dr_no,
        )->update(array(
            'paid_on' => $paid_on
        ));

        return redirect()->back()->with('success', 'Payment successfully processed');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reports()
    {
        $monthly_sales_report = $this->monthly_sales_income();

        return view('sales/reports',  compact('monthly_sales_report'));
    }

    public function monthly_sales_income()
    {
        $sales = DB::select(DB::raw(
            "SELECT * FROM dealer_erp.sales_view;"));
        
        return $sales;
       
       
    //    $pdf = PDF::loadView('analytics/disposition_analytics_print', compact('disposition','total') );  
    //    $pdf->setPaper('LETTER', 'landscape'); 
    //    return $pdf->stream('dispositions.pdf');
    }

    public function monthly_sales_income_print()
    {
        $sales = DB::select(DB::raw(
            "SELECT * FROM dealer_erp.sales_view;"));
        
        $pdf = PDF::loadView('sales/monthly_sales_income', compact('sales') );  
        $pdf->setPaper('LETTER', 'landscape'); 
        return $pdf->stream('Sales.pdf');
    }
}
