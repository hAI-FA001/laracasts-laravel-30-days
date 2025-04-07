<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            // check docs, can set these on service provider so we can can do Password:defaults()
            // "confirmed" makes sure attribute and attribute_confirmation match, this is why we set the name HTML attribute to "password_confirmation" and not "confirm_password"
            'password' => ['required', Password::min(5)->letters()->numbers(), 'confirmed'],
        ]);

        // create and persist in DB
        $user = User::create($validatedAttributes); // shortcut, validate() returns the validated attributes

        // log in
        Auth::login($user);

        // redirect
        return redirect('/jobs');
    }
}
