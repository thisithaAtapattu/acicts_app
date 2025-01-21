<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //

    public function create(Request $request)
    {

        $value = $request->query('value');


        $studentQuery = Student::select(["*"]);

        if ($value != null) {

            $studentQuery->where(function ($query) use ($value) {
                $query->where(DB::raw("CONCAT(first_name, ' ' ,last_name)"), 'LIKE', '%' . $value . '%')
                    ->orWhere('admission_no', 'LIKE', '%' . $value . '%')
                    ->orWhere(DB::raw("dob"), 'LIKE', '%' . $value . '%')
                    ->orWhere(DB::raw("entered_date"), 'LIKE', '%' . $value . '%');
            })->where('school_id', '=', $request->session()->get("school")->id);
        }

        return view("students.create", [

            "students" => $studentQuery->get()

        ]);
    }


    public function store(Request $request)
    {


        $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'date_of_birth' => ['required', 'date', 'before_or_equal:' . now()->subYears(6)->format('Y-m-d')],

            'admission_no' => ['required', "unique:students"],
            'entered_date' => ['required', 'date'],





        ]);


        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->date_of_birth,
            'admission_no' => $request->admission_no,
            'entered_date' => $request->entered_date,
            'school_id' => $request->session()->get("school")->id

        ]);


        return redirect("/schools/student-management")->with('success-message', 'Student Registration Successful!');
    }


    public function edit(Request $request, Student $student)
    {

        if($student->school_id!=$request->session()->get("school")->id){
            return redirect(to: "/schools/student-management")->with('error-message', 'Invalid School!');
        }

        if (!$request->has('first_name')) {

            return redirect(to: "/schools/student-management")->with('error-message', value: 'The first name field is required.');
        }



        if (empty($request->first_name)) {
            return redirect(to: "/schools/student-management")->with('error-message', value: 'The first name field is required.');
        }



        if (!$request->has('last_name') || empty($request->last_name)) {


            return redirect(to: "/schools/student-management")->with('error-message', value: 'The last name field is required.');
        }





        if (!$request->has('date_of_birth') || empty($request->date_of_birth)) {


            return redirect(to: "/schools/student-management")->with('error-message', value: 'The date of birth field is required.');
        }




        if (!strtotime($request->date_of_birth)) {

            return redirect(to: "/schools/student-management")->with('error-message', 'The date of birth field must be a valid date.');
        }

        if (!$request->has('admission_no') || empty($request->admission_no)) {


            return redirect(to: "/schools/student-management")->with('error-message', value: 'The admission no field is required.');
        }



        if (!$request->has('entered_date') || empty($request->entered_date)) {


            return redirect(to: "/schools/student-management")->with('error-message', value: 'The entered date field is required.');
        }




        if (!strtotime($request->entered_date)) {

            return redirect(to: "/schools/student-management")->with('error-message', 'The entered date field must be a valid date.');
        }







        if (Student::where('admission_no', $request->admission_no)->whereNot('id', $student->id)->exists()) {
            return redirect(to: "/schools/student-management")->with('error-message', 'The admission number has already been taken.');
        }


        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->dob = $request->date_of_birth;
        $student->entered_date = $request->entered_date;
        $student->admission_no = $request->admission_no;

        $student->save();

        return redirect("/schools/student-management")->with('success-message', 'The changes have been recorded!');
    }



  
}
