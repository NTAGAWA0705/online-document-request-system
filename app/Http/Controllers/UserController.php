<?php

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentStaff;
use App\Models\Staff;
use App\Models\Student;
use App\Models\SystemAdministrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function renderAllUsers()
    {
        $allUsers = User::all()->where('user_type', '!=', 'student');
        return view('users.all', [
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

    public function create()
    {
        $departments = Department::all();
        return view('users.new-user', [
            'departments' => $departments
        ]);
    }


    public function store(Request $request)
    {
        $formData = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'max:255',
            // 'idcard' => [Rule::unique('personnels', 'id_card_number')],
            // 'tel' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email_addr')],
            'password' => 'required|max:255'
        ]);

        // dd(bcrypt($request->password));
        $userrole = $request->user_type;

        $user = User::create([
            'email_addr' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1,
            'user_type' => $request->user_type,
            'userrole' => $userrole,
        ]);

        $user_info = [
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'status' => 1,
            'user_id' => $user->id,

        ];

        if ($request->user_type !== 'admin') {
            $user_info['role'] = 'staff';
            $staff = Staff::create($user_info);
            if ($request->user_type === "department" && $request->dep_id != "") {
                DepartmentStaff::create([
                    'department_id' => $request->dep_id,
                    'staff_id' => $staff->id,
                ]);
            }
        } else {
            SystemAdministrator::create($user_info);
        }

        Mail::to($user->email_addr)->send(new Subscribe($user_info, $request->email, $request->password));

        return redirect('/users')->with('usr.success', 'the new user registered successfully');
    }

    public function renderUserUpdate()
    {
        $settings = User::all()->where('id', '=', auth()->user()->id)->first();

        return view('students.updateStudent', [
            'user_info' => $settings,
        ]);
    }

    public function userUpdate(Request $request)
    {
        $user_id = $request->user_id;
        if ($request->has('fname')) {
            $fname = $request->fname;
            $lname = $request->lname;

            Student::where('user_id', '=', $request->user_id)->update([
                'first_name' => $fname,
                'last_name' => $lname,
            ]);
            if ($request->has('ref_number')) {
                Student::where('user_id', '=', $user_id)->update(['ref_number' => $request->ref_number]);
            }
        }

        User::where('id', '=', $user_id)->update(['email_addr' => $request->email]);
        if ($request->has('password')) {
            User::where('id', '=', $user_id)->update(['password' => bcrypt($request->password)]);
        }

        return back()->with('success', 'Information updated successfully!');
    }
}
