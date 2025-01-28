<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\BatchStudent;
use App\Models\Result;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class BatchStudentController extends Controller
{
    //
    public function index(SchoolClass $schoolClass, Batch $batch, BatchStudent $batchStudent, Request $request)
    {
        if ($schoolClass->teacher_id != $request->session()->get("teacher")->teacherId) {

            return redirect()->back();
        }

        if ($schoolClass->id != $batch->class_id) {

            return redirect()->back();
        }

        if ($batchStudent->batch_id != $batch->id) {

            return redirect()->back();
        }


        return view("batchstudent.index", [

            "schoolClass" => $schoolClass,
            "batch" => $batch,
            "batchStudent" => $batchStudent,
            "subjects" => Subject::all(),
            "results" =>  Result::where("batch_student_id", $batchStudent->id)->orderBy("term","asc")->get()

        ]);
    }


}
