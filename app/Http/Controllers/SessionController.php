<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // Validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Login attempt
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry. Those crentials do not match.'
            ]);
        };

        // Regen session token
        request()->session()->regenerate();

        // Redirect
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
