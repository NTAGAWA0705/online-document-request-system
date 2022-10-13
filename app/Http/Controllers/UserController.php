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
}
