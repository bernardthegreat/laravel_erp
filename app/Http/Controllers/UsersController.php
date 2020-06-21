<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use PDO;

class UsersController extends Controller
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
        $users = User::all()->where('role', '!=', 'dev')->where('remarks', 'active');

        return view('users/index', compact('users'));
    }
    
    public function create()
    {
        //
        return view('users/create');
    }

    public function store(Request $request)
    {
        //

        $user_exist = User::where([
            ['last_name', '=', $request->last_name],
            ['first_name', '=', $request->first_name],
        ])->first();
        
        if ($user_exist === null) {
            $validatedData = $request->validate([
                'username' => 'required|max:255',
                'first_name' => 'required|max:255',
                'middle_name' => 'max:255',
                'last_name' => 'required|max:255',
                'name_suffix' => 'max:255',
                'role' => 'max:255'
            ]);
            
            $user = auth()->user();

            $show = User::create($validatedData + [
                'password' => Hash::make($request->password),
                'created_by' => $user->id,
                'updated_by' => $user->id,
                'remarks' => 'active'
            ]);

            return redirect('/users')->with('success', 'User successfully saved');
        } else {
            return redirect('/users')->with('error', 'User already exists');
        }  
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
        $users = User::findOrFail($id);

        return view('users/edit', compact('users'));

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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'middle_name' => 'max:255',
            'name_suffix' => 'required|max:255'
        ]);
        User::whereId($id)->update($validatedData);

        return redirect('/users')->with('success', 'User successfully updated');
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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User successfully deleted');
    }


    public function soft_delete(Request $request, $id)
    {

        User::where('id', $id)->update(array(
            'remarks' => 'inactive'
        ));

        return redirect()->back()->with('error', 'User successfully deleted');
    }

    public function logout() {
        auth()->logout();

        return redirect('/');
    }
}
