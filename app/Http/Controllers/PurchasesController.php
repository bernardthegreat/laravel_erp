<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Item;
use Illuminate\Http\Request;

class PurchasesController extends Controller
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
        $purchases = Purchase::with('items')->get();
        
        $items = Item::all();

        return view('purchases/index', compact('purchases','items'));
    }

    public static function pending_deliveries()
    {
        $purchases = Purchase::with('items')->get();
        return view('purchases/pendings', compact('purchases'));
    }

    public function receive_purchase(Request $request, $id)
    {
        Purchase::where('id', $request->id)->update(array(
            'dr_no' => $request->dr_no,
            'received_at' => date('Y-m-d H:i:s'),
        ));
        return redirect()->back()->with('success', 'Order received');
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
        $validatedData = $request->validate([
            'item_id' => 'required|max:255',
            'dr_no' => 'max:255',
            'cost' => 'max:255',
            'qty' => 'max:255',
        ]);

        $code = date('m-d-y');

        $user = auth()->user();

        $show = Purchase::create($validatedData + [
            'code' => $code,
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Successfully purchased item(s)');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $purchases = Purchase::findOrFail($id);

        $items = Item::all();

        return view('purchases/edit', compact('purchases','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $receive_date = date('Y-m-d H:i:s', strtotime($request->received_at));

        $validatedData = $request->validate([
            'cost' => 'required|max:20',
            'dr_no' => 'required|max:20',
            'qty' => 'required|max:10',
        ]);

        $user = auth()->user();

        Purchase::whereId($id)->update($validatedData +[
            'updated_by' => $user->id,
            'received_at' => $receive_date
        ]);


        return redirect('/purchases')->with('success', 'Order successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchases = Purchase::findOrFail($id);
        $purchases->delete();

        return redirect('/purchases')->with('success', 'Order successfully deleted');
    }
}
