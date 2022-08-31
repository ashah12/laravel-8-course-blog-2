<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    protected function create()
    {
        return view('sessions.create');
    }

    protected function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to authenticate and log in the user
        // based on the provided credentials
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'Successfully logged in!');
        }
        // authentication fails
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
//        return redirect('/login')->with('success', 'Incorrect username or password');

        // redirect with a success flash message
    }

    protected function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
