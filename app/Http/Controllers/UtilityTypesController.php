<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UtilityType;

class UtilityTypesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $utility_types = UtilityType::all();

        return view('utility_types/index', compact('utility_types'));
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
        $utility_type_exists = UtilityType::where([
            ['name_short', '=', $request->name_short],
            ['name_long', '=', $request->name_long],
        ])->first();
        
        if ($utility_type_exists === null) {
            $validatedData = $request->validate([
                'name_short' => 'required|max:255',
                'name_long' => 'required|max:255',
            ]);
            
            $user = auth()->user();

            $show = Supplier::create($validatedData + [
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);

            return redirect('/utility_types')->with('success', 'Utility Types successfully saved');
        } else {
            return redirect('/utility_types')->with('error', 'Utility Types already exists');
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

        UtilityType::where('id', $id)->update(array(
            'remarks' => 'inactive'
        ));

        return redirect()->back()->with('error', 'Utility Types successfully deleted');
    }
}
