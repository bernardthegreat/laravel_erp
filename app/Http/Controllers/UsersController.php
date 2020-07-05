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

    public function index()
    {
        //
        $this->middleware('auth');
        $users = User::all()->where('role', '!=', 'dev')->where('remarks', '!=', 'active');

        

        return view('users/index', compact('users'));
    }
    
    public function create()
    {
        //
        return view('users/create');
    }

    public function external_store(Request $request)
    {
        //

        $user_exist = User::where([
            ['last_name', '=', $request->last_name],
            ['first_name', '=', $request->first_name],
        ])->first();
        
        if ($user_exist === null) {
            $validatedData = $request->validate([
                'username' => 'required|max:15',
                'first_name' => 'required|max:20',
                'middle_name' => 'max:20',
                'last_name' => 'required|max:20',
                'name_suffix' => 'max:10',
            ]);
            
            $user = auth()->user();

            $show = User::create($validatedData + [
                'role'=> 1,
                'password' => Hash::make($request->password),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            return redirect('login')->with('success', 'User successfully saved');
        } else {
            return redirect()->back()->with('error', 'User already exists');
        }  
    }

    public function store(Request $request)
    {
        //
        $this->middleware('auth');
        $user_exist = User::where([
            ['last_name', '=', $request->last_name],
            ['first_name', '=', $request->first_name],
        ])->first();
        
        if ($user_exist === null) {
            $validatedData = $request->validate([
                'username' => 'required|max:15',
                'first_name' => 'required|max:20',
                'middle_name' => 'max:20',
                'last_name' => 'required|max:20',
                'name_suffix' => 'max:10',
            ]);
            
            $user = auth()->user();

            $show = User::create($validatedData + [
                'role'=> $request->role,
                'password' => Hash::make($request->password),
                'created_by' => $user->id,
                'updated_by' => $user->id,
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
        $this->middleware('auth');
        $users = User::findOrFail($id);

        $roles = ['admin', 'standard'];

        return view('users/edit', compact('users', 'roles'));

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
        $this->middleware('auth');
        $validatedData = $request->validate([
            'username' => 'required|max:15',
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'middle_name' => 'max:20',
            'name_suffix' => 'max:10'
        ]);

        $user = auth()->user();

        User::whereId($id)->update($validatedData +[
            'role'=> $request->role,
            'password' => Hash::make($request->password),
            'updated_by' => $user->id,
        ]);

        return redirect()->back()->with('success', 'User successfully updated');
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
        $this->middleware('auth');

        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User successfully deleted');
    }


    public function soft_delete(Request $request, $id)
    {
        $this->middleware('auth');

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
