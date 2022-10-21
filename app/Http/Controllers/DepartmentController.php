<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function create()
    {
        $faculties = Faculty::all();
        return view('departments.new_department', [
            'faculties' => $faculties,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required',
            'faculty_id' => 'required',
        ]);

        Department::create([
            'department_name' => $request->department_name,
            'faculty_id' => $request->faculty_id,
        ]);

        return redirect('/departments')->with('success', 'New department created');
    }

    public function all()
    {
        $departments = Department::all();
        return view('departments.all_departments', [
            'departments' => $departments,
        ]);
    }
}
