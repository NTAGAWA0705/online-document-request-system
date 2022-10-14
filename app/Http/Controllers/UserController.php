<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function renderAllUsers()
    {
        $allUsers = User::all();
        return view('students.list_all', [
            'allUsers' => $allUsers
        ]);
    }

    public function renderSettingPage()
    {
        $user_data = [];

        return view('users.settings', [
            'user_data' => $user_data,
        ]);
    }

    public function renderNewUserForm()
    {
        return view('users.settings');
    }
}
