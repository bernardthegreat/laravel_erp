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

    public function soft_delete(Request $request, $id)
    {
        Utility::where('id', $id)->update(array(
            'remarks' => 'inactive'
        ));

        return redirect()->back()->with('error', 'Utility successfully deleted');
    }
}
