<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'password' => 'required'
        ]);
    }
}
