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
        $attributes = \request()->validate([
           'email' => 'required|email|exists:users,email',
           'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)){
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Your provided credentials could note be verified.'
                ]);
        }
        session()->regenerate();
        //session fixation
        return redirect('/')->with('success', 'Welcome Back !');
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye !');
    }
}
