<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show() {
        $users = User::all();
        return view('users.index', compact('users'));  
    }
    


    public function add(Request $request)
    {


       $validateData= $request->validate(['name' => 'required|string',
        'username' => 'required|string|unique:users',
        'number' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'website' => 'nullable|string',
        'company_name' => 'nullable|string']);

        User::create([
'name' => $validateData['name'],
        'username' => $validateData['username'],
        'phone' => $validateData['number'],
        'email' => $validateData['email'],
        'website' => $validateData['website'],
        'company_name' => $validateData['company_name'],
        ]);

        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->update($request->all());
    
       
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function destroy($id) {
        $users = User::find($id);
        $users->delete();


        $users = User::all();
        return view('users.index', compact('users'));
    }
   
    
}
