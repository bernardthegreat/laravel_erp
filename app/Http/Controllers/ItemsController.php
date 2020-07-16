<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Supplier;
use DB;

class ItemsController extends Controller
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
        $items = Item::with('suppliers')->get();

        $suppliers = Supplier::all();

        return view('items/index', compact('items', 'suppliers'));
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
        $user = auth()->user();


        $item_exist = Item::where('name_long', '=', $request->name_long)->first();


        if ($item_exist === null) {
            
            $validatedData = $request->validate([
                'name_short' => 'max:100',
                'name_long' => 'required|max:100',
                'supplier_id' => 'required|max:10',
                'stock_qty' => 'max:20',
                'remarks' => 'max:30',
                'unit' => 'max:20',
            ]);
            
            $user = auth()->user();

            $show = Item::create($validatedData + [
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);

            return redirect('/purchases/items')->with('success', 'Item successfully saved');
        } else {
            return redirect('/purchases/items')->with('error', 'Item already exists');
        }

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
        $items = Item::findOrFail($id);

        $suppliers = Supplier::all();

        return view('items/edit', compact('items','suppliers'));
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
        $validatedData = $request->validate([
            'supplier_id' => 'required|max:255',
            'name_short' => 'max:255',
            'name_long' => 'required|max:255',
            'stock_qty' => 'max:20',
            'unit' => 'max:20',
            'remarks' => 'max:25',
        ]);

        $user = auth()->user();

        Item::whereId($id)->update($validatedData + [
            'updated_by' => $user->id,
        ]);

        return redirect('/items')->with('success', 'Item successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function soft_delete(Request $request, $id)
    {

        Item::where('id', $id)->update(array(
            'remarks' => 'inactive'
        ));

        return redirect()->back()->with('error', 'Item successfully deleted');
    }
}
