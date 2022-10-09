<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Termwind\render;

class LoginController extends Controller
{
    public function renderLogin(Request $req)
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($request->has('remember_me')) {
            $remember = true;
        } else
            $remember = false;

        if (!auth()->attempt([
            'email_addr' => $request->email,
            'password' => bcrypt($request->password),
        ], $remember)) {
            return back()->with('error', __('Email address or password is incorrect'));
        }

        return redirect('/')->with('welcome', 'Welcome ');
    }

    /**
     * Logout the user
     */
    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
