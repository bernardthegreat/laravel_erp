<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SuppliersController extends Controller
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
        //
        $suppliers = Supplier::all()->where('remarks', '!=', 'inactive');

        return view('suppliers/index', compact('suppliers'));

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

        $supplier_exist = Supplier::where([
            ['name_short', '=', $request->name_short],
            ['name_long', '=', $request->name_long],
        ])->first();
        
        if ($supplier_exist === null) {
            $validatedData = $request->validate([
                'name_short' => 'required|max:255',
                'name_long' => 'required|max:255',
                'address' => 'max:255',
                'contact_no' => 'max:255',
            ]);
            
            $user = auth()->user();

            $show = Supplier::create($validatedData + [
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);

            return redirect('/suppliers')->with('success', 'Supplier successfully saved');
        } else {
            return redirect('/suppliers')->with('error', 'Supplier already exists');
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
        $suppliers = Supplier::findOrFail($id);

        return view('suppliers/edit', compact('suppliers'));
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
            'name_short' => 'required|max:255',
            'name_long' => 'required|max:255',
            'address' => 'max:255',
            'contact_no' => 'max:255',
        ]);
        
        Supplier::whereId($id)->update($validatedData);

        return redirect('/suppliers')->with('success', 'Supplier successfully updated');
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
}
