<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\ExtracurricularStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class ExtracurricularStudentController extends Controller
{
    //


    public function create(Extracurricular $extracurricular, Request $request)
    {

        if ($extracurricular->teacher_id != $request->session()->get("teacher")->teacherId) {

            return redirect("/teachers/extracurricular-management");
        }




        return view("extracurricularstudent.create", [
            "extracurricular" => $extracurricular,

            'students' => ExtracurricularStudent::select(["*", "extracurricular_students.id AS studentId"])->where("extracurricular_id", $extracurricular->id)->get(),

        ]);
    }


    public function store(Extracurricular $extracurricular, Request $request)
    {

        if ($extracurricular->teacher_id != $request->session()->get("teacher")->teacherId) {

            return redirect()->back();
        }



        $request->validate([

            'admission_no' => ['required'],



        ]);

        $studentResult = Student::select(["*", "students.id AS studentId"])->where("admission_no", $request->admission_no)->where("school_id", $extracurricular->school_id)->get();


        if ($studentResult->count() == 0) {
            return back()->withErrors(provider: ['admission_no' => 'Invalid Student!'])->withInput();;
        }

        if (ExtracurricularStudent::where("student_id", $studentResult[0]->studentId)->where("extracurricular_id", $extracurricular->id)->count() != 0) {
            return back()->withErrors(provider: ['admission_no' => 'A student with this admission no already exists for ' . $extracurricular->activity->name . '.'])->withInput();;
        }



        ExtracurricularStudent::create([


            'extracurricular_id' => $extracurricular->id,
            'student_id' => $studentResult[0]->studentId,

        ]);

        return redirect()->back()->with('success-message', 'The student has successfully been added to ' . $extracurricular->activity->name . '!');
    }
}
