<?php

namespace App\Http\Controllers;

use App\Client;
use DB;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clients = DB::select(DB::raw(
            "SELECT 
                c.id,
                c.name_short,
                c.name_long,
                c.contact_no,
                c.created_at,
                c.payment_term,
                if(sum(ifnull(((s.cost * s.qty) + s.addl_fee) - s.discount, 0))>0, 1, 0) as has_debt
            FROM
                clients c
                left join (select * from sales _s where _s.paid_on is null) as s on s.client_id = c.id
            GROUP BY c.id"));
        
        
        return view('clients/index', compact('clients'));
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
        $client_exist = Client::where([
            ['name_short', '=', $request->name_short],
            ['name_long', '=', $request->name_long],
        ])->first();
        
        if ($client_exist === null) {
            $validatedData = $request->validate([
                'name_short' => 'required|max:255',
                'name_long' => 'required|max:255',
                'address' => 'max:255',
                'contact_no' => 'max:255',
                'payment_term' => 'max:255'
            ]);
            
            $user = auth()->user();

            $show = Client::create($validatedData + [
                'created_by' => $user->id,
                'updated_by' => $user->id,
                'remarks' => 'active'
            ]);

            return redirect()->route('create_sales', [$show->id])->with('success', 'Client successfully saved');
        } else {
            return redirect('/clients')->with('error', 'Client already exists');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clients = Client::findOrFail($id);
        
        $payments = DB::table('sales')
                ->select(
                    'sales.created_at',
                    'sales.invoice_no', 
                    'sales.paid_on',
                    'sales.dr_no',
                    'items.name_long',
                )
                ->join('purchases', 'purchases.id', '=', 'sales.purchase_id')
                ->join('items', 'items.id', '=', 'purchases.item_id')
                ->groupByRaw('sales.invoice_no')
                ->whereRaw('paid_on is not null')
                ->where('client_id', $id)
                ->get();

        $debts = DB::table('sales')
                ->select(
                    'sales.created_at',
                    'sales.invoice_no', 
                    'sales.dr_no', 
                    'sales.cost',
                    'sales.qty',
                    'items.name_long'
                )
                ->join('purchases', 'purchases.id', '=', 'sales.purchase_id')
                ->join('items', 'items.id', '=', 'purchases.item_id')
                // ->groupByRaw('sales.invoice_no')
                ->whereRaw('paid_on is null')
                ->where('client_id', $id)
                ->get();

        $soa = DB::table('sales')
                ->select(
                    'sales.created_at',
                    'sales.invoice_no', 
                    'sales.dr_no', 
                    'sales.cost',
                    'sales.qty',
                    'items.name_long'
                )
                ->join('purchases', 'purchases.id', '=', 'sales.purchase_id')
                ->join('items', 'items.id', '=', 'purchases.item_id')
                // ->groupByRaw('sales.invoice_no')
                //->whereRaw()
                ->where('client_id', $id)
                ->get();

        return view('clients/edit', compact('clients', 'payments', 'debts', 'soa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validatedData = $request->validate([
            'name_short' => 'required|max:255',
            'name_long' => 'required|max:255',
            'address' => 'max:255',
            'contact_no' => 'max:255',
            'payment_term' => 'max:255'
        ]);
        Client::whereId($id)->update($validatedData);

        return redirect('/clients')->with('success', 'Client successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function soft_delete(Request $request, $id)
    {

        Client::where('id', $id)->update(array(
            'remarks' => 'inactive'
        ));

        return redirect()->back()->with('error', 'Client successfully deleted');
    }

}
