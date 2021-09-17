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
            'username' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        // if request succeeds, you should see this.
        // dd("success validation succeeded");

        User::create($attributes);

        return redirect('/');
    }
}
