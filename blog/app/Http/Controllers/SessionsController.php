<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    protected function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
