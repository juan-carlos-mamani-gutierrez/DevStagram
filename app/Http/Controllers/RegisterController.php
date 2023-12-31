<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        /* TODO  los que envias  */
       /*  dd($request); */
        /* o */
        /* TODO algo en espesifico */
        /* dd($request->get('email')); */
        $this->validate($request,[
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
        'name'=> $request->name,
        'username'=> $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password) 
        ]);
    }

  
}
