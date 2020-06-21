<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Client;
use App\User;

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

        
        //
        /*
        $patient_requests = PatientRequest::take(100)->with([
            'patients', 
            'departments', 
            'users', 
            'patient_request_dispositions'
        ])->get();

        $patients = Patient::where('active','=','1')->count();
        $requests = PatientRequest::count();
        $inpatients = PatientRequest::where('disposition_id','=','1')->count();
        $discharged = PatientRequest::where('disposition_id','=','2')->count();   
        $expired = PatientRequest::where('disposition_id','=','3')->count();        
        */
        
        return view('main_dashboard', compact('user'));
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
            $clients = Client::where('name_short', 'LIKE', $request->client_info.'%')
                    ->orWhere('name_long', 'LIKE', $request->client_info.'%')
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
