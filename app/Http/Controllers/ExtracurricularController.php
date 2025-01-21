<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Extracurricular;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExtracurricularController extends Controller
{

    //

    public function create(Request $request)
    {

        $value = $request->query('value');


        $queryBuilder = Extracurricular::select(["*", "extracurriculars.id AS extracurricularId"])->join("activities", "extracurriculars.activity_id", "=", "activities.id")->join("teachers", "extracurriculars.teacher_id", "=", "teachers.id")->orderBy(DB::raw("CONCAT(from_grade,' ',to_grade)"), "asc");

        if ($value != null) {

            if (strtolower($value) == "sport") {

                $value = "1";
            } else if (strtolower($value) == "club") {

                $value = "2";
            }


                $queryBuilder->where(function($query) use ($value) {
                    $query->where(DB::raw("activities.name"), '=', $value)
                        ->orWhere(DB::raw("activities.type"), '=', $value)
                        ->orWhere(DB::raw("CONCAT(teachers.first_name, ' ',teachers.last_name)"), 'LIKE', '%' . $value . '%')
                        ->orWhere(DB::raw("CONCAT(teachers.first_name, ' ',teachers.last_name,' - ',teachers.nic_no)"), 'LIKE', '%' . $value . '%')
                        ->orWhere(DB::raw("CONCAT(teachers.nic_no,' - ',teachers.first_name, ' ',teachers.last_name)"), 'LIKE', '%' . $value . '%');
                })->where('school_id', '=', $request->session()->get("school")->id);
        }




        return view("extracurriculars.create", [
            "extracurriculars" => $queryBuilder->get(),
            "extracurricularTypes" => [
                1 => "Sport",
                2 => "Club"

            ],

            "teachers" =>   Teacher::where("school_id", $request->session()->get("school")->id)->orderBy(DB::raw("CONCAT(nic_no,' - ',first_name,' ',last_name)"), "ASC")->get()

        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'extracurricular_type' => ['required', 'in:1,2'],
            'from_grade' => ['required', 'between:1,10', function ($attribute, $value, $fail) {
                if ($value < 1 && $value > 13) {
                    $fail('The from grade must be between 1 and 13.');
                }
            }],
            'to_grade' => ['required', function ($attribute, $value, $fail) {
                if ($value < 1 && $value > 13) {
                    $fail('The to grade must be between 1 and 13.');
                }
            }, 'gte:from_grade'],
            'teacher' => ['required', "exists:teachers,id"],

        ]);




        if ($request->extracurricular_type != 1 && $request->extracurricular_type != 2) {

            return back()->withErrors(provider: ['extracurricular_type' => 'The selected extracurricular type class is invalid.'])->withInput();;
        }

        $activity = Activity::createOrFirst([
            "name" => $request->name,
            "type" => $request->extracurricular_type,

        ]);


        if (Extracurricular::where("activity_id", $activity->id)->where("school_id", $request->session()->get("school")->id)->get()->count() == 0) {
            Extracurricular::create([
                "activity_id" =>  $activity->id,
                "type" => $request->extracurricular_type,
                "from_grade" => $request->from_grade,
                "to_grade" => $request->to_grade,
                "school_id" => $request->session()->get("school")->id,
                "teacher_id" => $request->teacher,


            ]);

            return redirect("/schools/extracurricular-management")->with('success-message', 'Extracurricular Registration Successful!');
        } else {

            return back()->withErrors(provider: ['name' => 'This extracurricular activity already exsists in the school.'])->withInput();;
        }
    }

    public function update(Extracurricular $extracurricular, Request $request)
    {


        



        if (Teacher::where("id", $request->teacher)->get()->count() != 1) {

            return redirect(to: "/schools/extracurricular-management")->with('error-message', value: 'The selected teacher is invalid.');
        }

        if ($request->from_grade < 1 || $request->from_grade > 13) {

            return redirect(to: "/schools/extracurricular-management")->with('error-message', 'The selected from grade is invalid.');
        }

        if ($request->to_grade < 1 || $request->to_grade > 13) {
            return redirect(to: "/schools/extracurricular-management")->with('error-message', 'The selected to  grade is invalid.');
        }

        $extracurricular->from_grade=$request->from_grade;
        $extracurricular->to_grade=$request->to_grade;
        $extracurricular->teacher_id=$request->teacher;

        $extracurricular->save();



        return redirect("/schools/extracurricular-management")->with('success-message', 'The changes have been recorded!');
    }
}
