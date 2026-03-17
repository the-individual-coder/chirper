<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Login Successfully!');
        }

        return back()->withErrors(['email' => 'The provided credentials are invalid', 'password' => 'Your Password was incorrect'])->onlyInput('email', 'password');
    }
}
