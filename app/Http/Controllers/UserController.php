<?php

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentStaff;
use App\Models\Staff;
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
        $userrole = "";

        if ($request->user_type === 'finance') {
            $userrole = "Finance Officer";
        } elseif ($request->user_type === 'department') {
            $userrole = "Department Admin";
        } elseif ($request->user_type === 'vlac') {
            $userrole = "TOP Ac Officer / VLAC";
        } elseif ($request->user_type === 'admin') {
            $userrole = "System Administrator";
        }


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

        return view('users.settings', [
            'user_info' => $settings,
        ]);
    }

    public function userUpdate(Request $request)
    {
    }
}
