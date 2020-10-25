<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Client;
use App\User;
use DB;

class DashboardController extends Controller
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
        $user = auth()->user();

        $stock_counts = DB::select(DB::raw(
            "select * from stock_qty_view"
        ));

        $gross_income_today = DB::select(DB::raw(
            "select * from gross_income_today_view"
        ));

        $client_dues = DB::select(DB::raw(
            "select * from due_clients_view"
        ));

        $gross_expense_today = DB::select(DB::raw(
            "select * from gross_expenses_today_view"
        ));

        $pending_delivery_supplies = DB::select(DB::raw(
            "select 
            i.name_long as item_name, 
            s.name_long as supplier,
            p.cost,
            p.qty as quantity,
            p.created_at as purchased_date
            from purchases p
            join items i on i.id = p.item_id
            join suppliers s on s.id = i.supplier_id
            where p.received_at is null"
        ));
        
        

        $count_client_dues = count($client_dues);

        $count_pending_delivery_supplies = count($pending_delivery_supplies);
        
        
        return view('main_dashboard', compact(
                    'user', 
                    'stock_counts', 
                    'gross_income_today', 
                    'gross_expense_today',
                    'count_client_dues',
                    'client_dues',
                    'pending_delivery_supplies',
                    'count_pending_delivery_supplies'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


    public function search_client(Request $request){

        if(isset($request->client_info)) {
            $clients = Client::where('name_short', 'LIKE', '%'.$request->client_info.'%')
                    ->orWhere('name_long', 'LIKE', '%'.$request->client_info.'%')
                    ->get();
                    
            if (count($clients)>0) {
                return view('clients.client_search_result', compact('clients'));
            }
            else {
                return view('clients.create')->with('error', 'Client not found');
            } 
        } else {
            return view('clients.create')->with('error', 'Client not found');
        } 
    }


}
