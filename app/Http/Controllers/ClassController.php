<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    //

    public function store(Request $request)
    {


        $validatedData = $request->validate(
            [
                'grade' => ['required', "min:1", "max:13"],
                'name' => ['required', 'max:10'],
                'teacher_id' => ['required', "exists:teachers,id"],


            ],
            [
                'teacher_id.required' => 'The teacher field is required.',
                'teacher_id.exists' => 'The selected teacher is invalid.',
            ]
        );




        if ($request->grade < 1 | $request->grade > 13) {
            return back()->withErrors(provider: ['grade' => 'The grades must be between 1 and 13.'])->withInput();;
        }

        $classResult = SchoolClass::where("name", $request->name)
            ->where("grade", $request->grade)->get();

        if ($classResult->count() != 0) {
            return back()->withErrors(provider: ['class_error' => 'This class already exsists.'])->withInput();;
        }

        SchoolClass::create(["name" => $request->name, "grade" => $request->grade, "school_id" => $request->session()->get("school")->id, "teacher_id" => $request->teacher_id]);

        return redirect("/schools/class-management")->with('success-message', 'Class Registration Successful!');
    }

    public function create(Request $request)



    {

        $value = $request->query('value');


        $queryBuilder = SchoolClass::select(["*", "classes.id AS classId"])->join("teachers", "classes.teacher_id", "=", "teachers.id")->orderBy(DB::raw("CONCAT(grade,' ',name)"), "asc");

        if ($value != null) {
            $queryBuilder->where(function ($query) use ($value) {
                $query->where(DB::raw("CONCAT(name, ' ',grade)"), 'LIKE', '%' . $value . '%')
                    ->orWhere(DB::raw("CONCAT(grade, ' ',name)"), 'LIKE', '%' . $value . '%')
                    ->orWhere(DB::raw("CONCAT(teachers.first_name, ' ',teachers.last_name)"), 'LIKE', '%' . $value . '%')
                    ->orWhere(DB::raw("CONCAT(teachers.first_name, ' ',teachers.last_name,' - ',teachers.nic_no)"), 'LIKE', '%' . $value . '%')
                    ->orWhere(DB::raw("CONCAT(teachers.nic_no,' - ',teachers.first_name, ' ',teachers.last_name)"), 'LIKE', '%' . $value . '%');
            })->where('school_id', '=', $request->session()->get("school")->id);
        }



        return view("classes.create", [
            "classes" =>   $queryBuilder->get(),
            "teachers" =>   Teacher::where("school_id", $request->session()->get("school")->id)->orderBy(DB::raw("CONCAT(nic_no,' - ',first_name,' ',last_name)"), "ASC")->get()
        ]);
    }

    public function update(Request $request, SchoolClass $schoolClass)
    {


        if($schoolClass->school_id!=$request->session()->get("school")->id){
            return redirect("/schools/class-management")->with('error-message', 'Invalid Class!');
        }


        if (Teacher::where("id", $request->teacher_id)->get()->count() == 1) {

            $schoolClass->teacher_id = $request->teacher_id;
            $schoolClass->save();

            return redirect("/schools/class-management")->with('success-message', 'The class teacher has successfully been updated!');
        } else {
            return redirect("/schools/class-management")->with('error-message', 'The selected teacher is invalid.');
        }
    }

    public function edit(){


        // return view();
    }


    public function manage(Request $request){

        return view("classes.manage",[
            "classes" =>  SchoolClass::where('teacher_id',$request->session()->get("teacher")->id)->orderBy(DB::raw("CONCAT(grade,' ',name)"), "asc")->get()
        ]);

    }



}
