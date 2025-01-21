<?php

namespace App\Http\Controllers;

use App\Mail\TeacherVerification;
use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    //

    public function create(Request $request)
    {

        $value = $request->query('value');


        $teacherQuery = Teacher::select(["*", "teachers.id AS teacherId"]);

        if ($value != null) {


            $queryBuilder = $teacherQuery->where(function ($query) use ($value) {
                $query->where(DB::raw("CONCAT(first_name, ' ' ,last_name)"), 'LIKE', '%' . $value . '%')
                    ->orWhere('email', 'LIKE', '%' . $value . '%')
                    ->orWhere(DB::raw("nic_no"), 'LIKE', '%' . $value . '%');
            })->where('school_id', '=', $request->session()->get("school")->id);
        }

        // return $teacherQuery->get();

        return view("teachers.create", [
            "schoolClasses" => SchoolClass::all(),
            "teachers" => $teacherQuery->get(),
        ]);
    }

    public function update(Teacher $teacher, Request $request)
    {


        if ($teacher->school_id != $request->session()->get("school")->id) {
            return 2;
        }


        if (
            !empty($request->first_name) &&
            !empty($request->last_name) &&
            !empty($request->nic_no) &&
            preg_match("/^(([5,6,7,8,9]{1})([0-9]{1})([0,1,2,3,5,6,7,8]{1})([0-9]{6})([v|V|x|X]))|(([1,2]{1})([0,9]{1})([0-9]{2})([0,1,2,3,5,6,7,8]{1})([0-9]{7}))/", $request->nic_no) ||
            !empty($email) &&
            filter_var($request->email, FILTER_VALIDATE_EMAIL) ||
            !empty($request->contact_no) || strlen($request->contact_no) <= 12
        ) {

            if (
                Teacher::where("email", $request->email)
                ->whereNot("id", $teacher->id)
                ->get()->count() == 0 &&

                Teacher::where("contact_no", $request->contact_no)
                ->whereNot("id", $teacher->id)
                ->get()->count() == 0 &&

                Teacher::where("contact_no", $request->contact_no)
                ->whereNot("nic_no", $teacher->nic_no)
                ->get()->count() == 0
            ) {


                $teacher->first_name = $request->first_name;
                $teacher->last_name = $request->last_name;
                $teacher->nic_no = $request->nic_no;
                $teacher->email = $request->email;
                $teacher->contact_no = $request->contact_no;

                $teacher->save();
                return 1;
            }
        }


        return 2;
    }

    public function block(Teacher $teacher, Request $request)
    {
        if ($teacher->school_id != $request->session()->get("school")->id) {
            return redirect()->back()->with('error-message', 'Invalid teacher!');
        }
        $teacher->status = 2;
        $teacher->save();

        return redirect()->back()->with('success-message', 'User blocked successfully!');
    }




    public function unblock(Teacher $teacher,Request $request)
    {

        if ($teacher->school_id != $request->session()->get("school")->id) {
            return redirect()->back()->with('error-message', 'Invalid teacher!');
        }

        $teacher->status = 1;
        $teacher->save();

        return redirect()->back()->with('success-message', 'User unblocked successfully!');
    }

    public function store(Request $request)
    {


        $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'nic_no' => ['required', 'regex:^(([5,6,7,8,9]{1})([0-9]{1})([0,1,2,3,5,6,7,8]{1})([0-9]{6})([v|V|x|X]))|(([1,2]{1})([0,9]{1})([0-9]{2})([0,1,2,3,5,6,7,8]{1})([0-9]{7}))^', 'min:10'],
            'email' => ['required', 'email', 'max:255', "unique:teachers"],
            'contact_no' => ['required', 'max:12', "unique:teachers"],
            'password' => ['required', 'max:255'],
            'confirm_password' => ['required', 'max:255'],




        ]);


        if ($request->password != $request->confirm_password) {
            return back()->withErrors(provider: ["confirm_password" => "The passwords entered don't match."])->withInput();;
        }



        $verificationCode = uniqid();

        $teacher = Teacher::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'nic_no' => $request->nic_no,

            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'password' => Hash::make($request->password),
            'confirm_password' => $request->confirm_password,
            'status' => 1,

            'verification_code' =>  $verificationCode,

            'school_id' => $request->session()->get("school")->id


        ]);

        return redirect("/schools/teacher-management")->with('success-message', 'Teacher Registration Successful!');
    }


    public function login()
    {



        return view("teachers.login");
    }

    public function authenticate(Request $request)
    {
        $request->validate([

            'email' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],



        ]);


        $teacherResult = Teacher::select(["*", "teachers.id AS teacherId"])->where("email", operator: $request->email)
            ->where("status", 1)
            ->get();



        if ($teacherResult->count() != 0) {

            $teacher = $teacherResult[0];

            if (Hash::check($request->password, $teacher->password)) {


                $request->session()->put('teacher', $teacher);
                return redirect("/teachers/class-management");
            } else {
                return back()->withErrors(['not_found' => 'These credentials do not match our records.'])->withInput();;
            }
        } else {
            return back()->withErrors(['not_found' => 'These credentials do not match our records.'])->withInput();;
        }
    }


    public function edit()
    {


        return view("teachers.edit");
    }


    public function logout()
    {
        Session::invalidate();
        return redirect("/teachers/login");
    }
}
