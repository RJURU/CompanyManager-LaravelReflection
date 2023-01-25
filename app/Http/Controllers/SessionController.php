<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login() {
        return view('sessions.login');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function store() {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Incorrect Email Or Password.']);
    }
}
