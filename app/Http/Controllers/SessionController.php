<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    // other stuff to try:
    // - rate limiting (control rate of requests sent to server)
    // - reset password
    // - delivering email

    public function store()
    {
        // validate
        $validatedAttributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // attempt to log in
        if (!Auth::attempt($validatedAttributes)) {
            // similar to validate(), Laravel checks it's a ValidationException and automatically redirects to /login
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials don\'t match',
            ]);
        }

        // regenerate the session token
        // security measure to protect against Session Hijacking (exploiting valid token for unauthorized access to a web server)
        request()->session()->regenerate();

        // redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
