<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;

class SessionsController extends Controller
{
    protected function create()
    {
        return view('sessions.create');
    }

    protected function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Your provided credentials could not be verified.']);
        }

//        throw ValidationException::withMessages([
//            'email' => 'Your provided credentials could not be verified.'
//        ]);

        session()->regenerate();
        
        return redirect('/')->with('success', 'Successfully logged in!');
    }

    protected function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
