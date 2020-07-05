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
        
        $items = Item::all()->where('remarks', '!=','inactive');

        return view('purchases/index', compact('purchases','items'));
    }

    public static function receive_purchase(Request $request, $id)
    {
        //

        Purchase::where('id', $request->id)->update(array(
            'dr_no' => $request->dr_no
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
        //

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
            'remarks' => 'active'
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

        $validatedData = $request->validate([
            'name_short' => 'required|max:255',
            'name_long' => 'required|max:255',
            'address' => 'max:255',
            'contact_no' => 'max:255',
            'payment_term' => 'max:255'
        ]);
        User::whereId($id)->update($validatedData);

        return redirect('/clients')->with('success', 'Client successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
