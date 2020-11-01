<?php

namespace App\Http\Controllers;

use App\Client;
use App\Purchase;
use App\Item;
use App\Sale;
use DB;
use Illuminate\Http\Request;
use PDF;

class SalesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $sales = DB::select(DB::raw(
        "select * from sales_view"
      ));
      return view('sales/index', compact('sales'));
    }

    public function create($id)
    {
      $items = DB::select(DB::raw(
          "select * from stock_qty_view"
      ));
      $client = Client::all()->where('id', $id);
      return view('sales/create', compact('items', 'client'));
    }

    public function insert_sale(Request $request)
    {
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
          $remarks,
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
            _s.dr_no,
            _s.paid_on,
            _c.name_long as client_name,
            _c.address,
            _c.contact_no
        FROM
            sales _s
                JOIN
            items _i ON _i.id = _s.item_id
                JOIN
            clients _c ON _c.id = _s.client_id
        WHERE
            _c.id = $id"));
        return view('sales/bill_client', compact('clients', 'break_downs'));
    }

    public function print_billing_statement($id)
    {
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
                _s.dr_no,
                _s.paid_on
            FROM
                sales _s
                    JOIN
                items _i ON _i.id = _s.item_id
            WHERE
                _s.client_id = $id"));
        //dd($break_down);
        $pdf = PDF::loadView('sales/billing_statement_print', compact('clients', 'break_downs'));
        $pdf->setPaper('LETTER', 'landscape');
        return $pdf->stream('Billing Statement.pdf');
    }

    public function statement_of_account_print($id)
    {
      $break_downs = DB::select(DB::raw(
          "SELECT
              _s.cost,
              _s.qty,
              _i.name_long,
              _s.addl_fee,
              _s.discount,
              _s.created_at,
              _s.invoice_no,
              _s.dr_no,
              _s.paid_on,
              _c.name_long as client_name,
              _c.address,
              _c.contact_no
          FROM
              sales _s
                  JOIN
              items _i ON _i.id = _s.item_id
                  JOIN
              clients _c ON _c.id = _s.client_id
          WHERE
              _s.dr_no = $id"));
      
      $pdf = PDF::loadView('sales/statement_of_account_print', compact('break_downs'));
      $pdf->setPaper('LETTER', 'landscape');
      return $pdf->stream('Billing Statement.pdf');
    }

    public function sales_ordering($client_id)
    {
      return view('sales/sales_ordering');
    }

    public function point_of_sale()
    {
      $clients = Client::all();
      $items = DB::select(DB::raw("SELECT * FROM dealer_erp.stock_qty_view"));
      return view('sales/point_of_sale', compact('clients', 'items'));
    }

    public function submit_pos_order(Request $request) 
    {
      $client_id = $request->client_id;
      $item_ids = $request->item_id;
      $dr_no = $request->dr_no;
      $invoice_no = '0'; 
      $costs = $request->cost;
      $order_qtys = $request->qty;
      $discounts = $request->discount;
      $additional_fees = $request->additional_fee;
      $user_id = $request->user_id;
      $remarks = $request->remarks;

      $orders = array();

      $item_ids_count = count($item_ids);

      for ($i = 0; $i < $item_ids_count; $i++) {
        array_push($orders, array(
            $item_ids[$i],
            $order_qtys[$i],
            $costs[$i],
            $discounts[$i],
            $additional_fees[$i],
            $remarks[$i]
        ));
      }

      DB::transaction(function() use ($orders,$client_id,$dr_no,$invoice_no,$user_id) {
        foreach ($orders as $o) {
          $insert_sale = DB::select('call insert_sale(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @err)', array(
              $client_id,
              $o[0],
              $dr_no,
              $invoice_no,
              $o[2],
              $o[1],
              $o[3],
              $o[4],
              $user_id,
              $o[5]
          ));
          $select_error_code = DB::select('select @err as error_code');
          if ($select_error_code) {
            $error_code = $select_error_code[0]->error_code;
            if ($error_code > 0) {
                throw new \Exception('Error saving order. Error code is ' . $error_code); // Throwing exception rolls back the transaction
            }
              
          } else {
              throw new \Exception('Error saving order.'); // Throwing exception rolls back the transaction
          }
        }
      });
      trim($request->sold_date);
      if(isset($request->sold_date) || !is_null($request->sold_date)) {
        $last_inserted_id = DB::select(DB::raw("SELECT max(id) as id FROM sales"));
        $sold_date = date('Y-m-d', strtotime($request->sold_date));
        Sale::where('id', $last_inserted_id[0]->id)->update(array('created_at' => $sold_date));
      }
      
      return redirect()->back()->with('success', 'Items successfully sold');
    }

    public function show($id)
    {
        
    }

    public function get_payments()
    {
        $sales = DB::table('sales')
            ->join('clients', 'clients.id', '=', 'sales.client_id')
            ->join('items', 'items.id', '=', 'sales.item_id')
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
                'sales.paid_on',
                'sales.remarks'
            )->get();

        return view('sales/payments', compact('sales'));
    }

    public function process_payment(Request $request)
    {

        $paid_on = date('Y-m-d H:i:s', strtotime($request->paid_on));
        Sale::where('dr_no', $request->dr_no)->update(array(
            'paid_on' => $paid_on,
            'remarks' => $request->remarks,
        ));

        return redirect()->back()->with('success', 'Payment successfully processed');
    }

    public function edit($id)
    {
      $sales = Sale::findOrFail($id);
      $items = Item::all();
      $clients = Client::all();
      return view('sales/edit', compact('items', 'clients', 'sales'));
    }

    
    public function update(Request $request, $id)
    {
        if(!is_null($request->paid_on) && $request->paid_on != '') {
          $paid_date = date('Y-m-d H:i:s', strtotime($request->paid_on));
        } else {
          $paid_date = NULL;
        }

        $validatedData = $request->validate([
            'client_id' => 'required|max:20',
            'item_id' => 'required|max:20',
            'dr_no' => 'max:50',
            'cost' => 'required|max:10',
            'qty' => 'required|max:10',
            'discount' => 'max:10',
            'addl_fee' => 'max:10',
        ]);

        $user = auth()->user();

        Sale::whereId($id)->update($validatedData + [
            'updated_by' => $user->id,
            'paid_on' => $paid_date,
        ]);

        return redirect('/sales')->with('success', 'Sale successfully updated');
    }

    public function delete($id)
    {
      $sale = DB::select(DB::raw(
        "select id from sales where code = '$id'"
      ));
      $sale_id = $sale[0]->id;
      DB::transaction(function() use ($sale_id) {
          $delete_sale = DB::select('call update_sale_void(?, @err)', array(
            $sale_id,
          ));
          $select_error_code = DB::select('select @err as error_code');
          if ($select_error_code) {
              $error_code = $select_error_code[0]->error_code;   
              if ($error_code > 0) {
                  throw new \Exception('Error saving order. Error code is ' . $error_code); // Throwing exception rolls back the transaction
              }
              
          } else {
              throw new \Exception('Error saving order.'); // Throwing exception rolls back the transaction
          }
      });

      return redirect('/sales')->with('success', 'Sale successfully deleted');
    }
}
