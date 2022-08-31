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

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            //session fixation
            
            return redirect('/')->with('success', 'Successfully logged in!');
        }

//        throw ValidationException::withMessages([
//            'email' => 'Your provided credentials could not be verified.'
//        ]);

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    protected function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
