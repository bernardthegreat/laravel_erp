<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Utility;
use App\UtilityType;

class UtilitiesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $utilities = Utility::with('utility_types')->get();

        $utility_types = UtilityType::all()->where('remarks', '!=','inactive');

        return view('utilities/index', compact('utilities', 'utility_types'));
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
        $validatedData = $request->validate([
            'utility_type_id'=>'max:15',
            'cost' => 'required|max:255',
        ]);
        
        $user = auth()->user();

        $show = Utility::create($validatedData + [
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ]);

        return redirect('/utilities')->with('success', 'Utility successfully saved');
    
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

        $utilities = Utility::findOrFail($id);

        $utility_types = UtilityType::all();

        return view('utilities/edit', compact('utilities','utility_types'));
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
            'cost' => 'required|max:15',
            'utility_type_id' => 'max:2'
        ]);

        $user = auth()->user();

        Utility::whereId($id)->update($validatedData +[
            'updated_by' => $user->id,
        ]);

        return redirect('/utilities')->with('success', 'Utility successfully updated');
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
        Utility::where('id', $id)->update(array(
            'remarks' => 'inactive'
        ));

        return redirect()->back()->with('error', 'Utility successfully deleted');
    }
}
