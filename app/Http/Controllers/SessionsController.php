<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }


    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email', //exists in the users table in the email column
            'password' => 'required'
        ]);

        // athenticate a returning user
        if (auth()->attempt($attributes)) {
            
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        // auth failed
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your credentials could not be verified.']);

    }


    public function destroy()
    {
        auth()->logout();

        session()->flash('success', 'Goodbye!');

        return redirect('/');
    }
}
