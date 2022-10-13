<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function Termwind\render;

class LoginController extends Controller
{
    public function renderLogin(Request $req)
    {
        return view('users.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($request->has('remember_me')) {
            $remember = true;
        } else
            $remember = false;

        $email = $request->email;
        $password = bcrypt($request->password);

        // dd($email, $password);

        if (auth()->attempt([
            'email_addr' => $request->email,
            'password' => $request->password,
        ], $remember)) {
            return redirect('/')->with('welcome', "Welcome ");
        } else {
            return back()->with('error', __('Email address or password is incorrect'));
        }
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
