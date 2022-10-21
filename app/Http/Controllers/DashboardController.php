<?php

namespace App\Http\Controllers;

use App\Models\Documentrequest;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function create()
    {
        $nberOfStudents = Student::all()->count();
        $nberRequests = Documentrequest::all()->count();
        $pending = Documentrequest::all()->where('status', '<=', 1)->count();
        $completed = Documentrequest::all()->where('status', '=', 2)->count();

        return view('dashboard.dashboard', [
            'nberOfStudents' => $nberOfStudents,
            'nberRequests' => $nberRequests,
            'pending' => $pending,
            'completed' => $completed,
        ]);
    }
}
