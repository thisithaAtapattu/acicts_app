<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\BatchStudent;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    //

    public function create(SchoolClass $schoolClass, Request $request)
    {

        if ($schoolClass->teacher_id != $request->session()->get("teacher")->teacherId) {

            return redirect("/teachers/class-management");
        }




        return view("batches.create", [
            "schoolClass" => $schoolClass,
            "batches" => Batch::where("class_id", $schoolClass->id)->get()
        ]);
    }

    public function store(SchoolClass $schoolClass, Request $request)
    {

        if ($schoolClass->teacher_id != $request->session()->get("teacher")->teacherId) {

            return redirect()->back()->with('error-message', 'Invalid teacher!');
        }



        $request->validate([
            'from_date' => ['required', 'date'],
            'to_date' => ['required', 'date', 'after:from_date'],
        ]);

        if (Batch::where('from_date', operator: $request->from_date)->where('to_date', $request->to_date)->exists()) {
            return back()->withErrors(provider: ['batch_error' => 'A batch with the same from date and the to date already exsists.'])->withInput();;
        }

        Batch::create([
            'class_id' => $schoolClass->id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'teacher_id' => $request->session()->get("teacher")->id,


        ]);

        return redirect()->back()->with('success-message', 'The batch has successfully been created!');
    }


    public function edit(SchoolClass $schoolClass, Batch $batch, Request $request)
    {


        if ($schoolClass->teacher_id != $request->session()->get("teacher")->teacherId) {

            return redirect()->back();
        }

        if ($schoolClass->id != $batch->class_id) {

            return redirect()->back();
        }

        return view("batches.edit", [
            'batch' => $batch,
            'schoolClass' => $schoolClass,

            'students' => BatchStudent::select(["*", "batch_students.id AS batchStudentId"])->where("batch_id", $batch->id)->get(),
        ]);
    }

    public function update(SchoolClass $schoolClass, Batch $batch, Request $request)
    {

        if ($schoolClass->teacher_id != $request->session()->get("teacher")->teacherId) {

            return redirect()->back();
        }

        if ($schoolClass->id != $batch->class_id) {

            return redirect()->back();
        }


        $request->validate([

            'admission_no' => ['required'],



        ]);
        $studentResult = Student::select(["*", "students.id AS studentId"])->where("admission_no", $request->admission_no)->where("school_id", $schoolClass->school_id)->get();

        if ($studentResult->count() == 1) {
            BatchStudent::create([


                'batch_id' => $batch->id,
                'student_id' => $studentResult[0]->studentId,
                
            ]);

            return redirect()->back()->with('success-message', 'The student has successfully been added to the batch!');
        } else {

            return back()->withErrors(provider: ['admission_no' => 'Invalid Student!'])->withInput();;
        }
    }
}
