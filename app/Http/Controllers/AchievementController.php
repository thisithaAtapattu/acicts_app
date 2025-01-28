<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Event;
use App\Models\ExtracurricularStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    //
    public function create(ExtracurricularStudent $extracurricularStudent, Request $request)
    {

        if ($extracurricularStudent->extracurricular->teacher_id != $request->session()->get("teacher")->teacherId) {

            return redirect()->back();
        }

        return view("achievements.create", [

            "student" => $extracurricularStudent,
            "achievements" => Achievement::join("events", "events.id", "achievements.event_id")->where("extracurricular_student_id", $extracurricularStudent->id)->orderBy(DB::raw("events.name", "ASC"))->get()


        ]);
    }

    public function store(ExtracurricularStudent $extracurricularStudent, Request $request)
    {


        if ($extracurricularStudent->extracurricular->teacher_id != $request->session()->get("teacher")->teacherId) {

            return redirect()->back();
        }

        $request->validate([
            'event' => ['required', 'max:255'],
            'place' => ['required', 'integer',  'min:1'],




        ]);


        $event = Event::firstOrCreate([
            "name" => $request->event
        ]);



        if (Achievement::where('event_id', $event->id)->where('extracurricular_student_id', $extracurricularStudent->id)->exists()) {
            return back()->withErrors(provider: ['achievement_error' => 'This achievement of this student has already exists.'])->withInput();;
        }



        Achievement::create([

            "event_id" => $event->id,
            "extracurricular_student_id" => $extracurricularStudent->id,
            "place" => $request->place,

        ]);

        return redirect()->back()->with('success-message', 'Achievement Successfully Added!');
    }
}
