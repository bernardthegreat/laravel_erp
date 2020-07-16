<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\Item;

class InterestsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $interests = Interest::with('items')->get();

        return view('interests/index', compact('interests'));
    }

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
        $interests = Interest::findOrFail($id);

        $items = Item::all();

        return view('interests/edit', compact('interests','items'));
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
            'item_id' => 'required|max:15',
            'qty_from' => 'max:10',
            'qty_to' => 'max:10',
            'rate' => 'max:10'
        ]);

        $user = auth()->user();

        Interest::whereId($id)->update($validatedData +[
            'updated_by' => $user->id,
        ]);

        return redirect('/interests')->with('success', 'Interest successfully updated');
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

    public function soft_delete(Request $request, $id)
    {

        Interest::where('id', $id)->update(array(
            'remarks' => 'inactive'
        ));

        return redirect()->back()->with('error', 'Interest successfully deleted');
    }
}
