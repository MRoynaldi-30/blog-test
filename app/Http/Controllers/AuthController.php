<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginShow(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin');
            } elseif (Auth::user()->role == 'author') {
                return redirect()->intended('/author');
            } else {
                return redirect()->intended('/');
            }
        }
    

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|min:3|max:255',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // dd(Auth::user());
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin');
            } elseif (Auth::user()->role == 'author') {
                return redirect()->intended('/author');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->with('LoginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
