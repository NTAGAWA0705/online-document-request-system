<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function renderStudentList()
    {
        $allStudents = Student::all();
        return view('students.list_all', [
            'allStudents' => $allStudents
        ]);
    }

    public function createStudent(Request $request)
    {
        $formData = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'max:255',
            // 'idcard' => [Rule::unique('personnels', 'id_card_number')],
            // 'tel' => 'required',
            'reg_number' => 'max:255',
            // 'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email_addr')],
            'reg_number' => ['required',  Rule::unique('students', 'ref_number')],
            'password' => 'max:255'
        ]);

        // dd(bcrypt($request->password));

        $user = User::create([
            'email_addr' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1,
            'user_type' => 'student',
        ]);


        $student = Student::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'ref_number' => $request->reg_number,
            'status' => 1,
            'user_id' => $user->id,
        ]);

        return redirect('/students')->with('success', 'the new student registered successfully');
    }

    public function renderNewStudentForm(Request $request)
    {
        return view('students.new_student_form');
    }
}
