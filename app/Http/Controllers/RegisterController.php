<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required|min:6|unique:users,username', //unique on the users table and the username collumn
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        // if request succeeds, you should see this.
        // dd("success validation succeeded");

        User::create($attributes);

        session()->flash('success', 'Your account has been created.');

        return redirect('/');
    }
}
