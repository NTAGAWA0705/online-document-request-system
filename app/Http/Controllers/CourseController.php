<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function create()
    {
        $departments = Department::all();
        return view('courses.new_course', [
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'credits' => 'required',
            'department_id' => 'required',
            'year' => 'required',
        ]);

        Course::create([
            'course_name' => $request->name,
            'credits' => $request->credits,
            'year' => $request->year,
            'department_id' => $request->department_id,
        ]);

        return redirect('/courses')->with('success', 'New course created');
    }

    public function all()
    {
        $courses = Course::all();
        return view('courses.all_courses', [
            'courses' => $courses,
        ]);
    }
}
