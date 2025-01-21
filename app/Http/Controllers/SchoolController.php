<?php

namespace App\Http\Controllers;

use App\Mail\SchoolVerificationMail;
use App\Models\District;
use App\Models\School;
use App\Models\SchoolClass;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SchoolController extends Controller
{
    //
    public function login()
    {



        return view("school.login");
    }

    public function edit()
    {



        return view("school.edit");
    }

    public function logout()
    {
        Session::invalidate();
        return redirect("/schools/login");
    }




    public function create()
    {

        return view("school.create", [
            "districts" => District::all()

        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([

            'email' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],



        ]);


        $schoolResult = School::where("email", $request->email)
            ->get();



        if ($schoolResult->count() != 0) {

            $school = $schoolResult[0];

            if (Hash::check($request->password, $school->password)) {


                $request->session()->put('school', $school);
                return redirect("/schools/student-management");
            } else {
                return back()->withErrors(['not_found' => 'These credentials do not match our records.'])->withInput();;
            }
        } else {
            return back()->withErrors(['not_found' => 'These credentials do not match our records.'])->withInput();;
        }
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255'],
            'contact_no' => ['required', 'max:12', "unique:schools"],
            'email' => ['required', 'email', 'max:255', "unique:schools"],
            'postal_address_line_1' => ['required', 'max:255'],
            'postal_address_line_2' => ['required', 'max:255'],
            'district' => ['required',  "exists:districts,id"],
            'password' => ['required', 'max:255'],



        ]);

        $address = $request->postal_address_line_1 . ", " . $request->postal_address_line_2 . ", " . $request->district;

        $countChangeRequest = School::where("address_line_1", $request->postal_address_line_1)
            ->where("address_line_2", $request->postal_address_line_2)
            ->where("district_id", $request->district)
            ->get();

        if ($countChangeRequest->count() != 0) {

            return back()->withErrors(provider: ['address' => 'Please re-check the postal address lines and the district.'])->withInput();;
        }


        $school = School::create(attributes: ['name' => $request->name, 'contact_no' => $request->contact_no, 'email' => $request->email, 'address_line_1' => $request->postal_address_line_1, 'address_line_2' => $request->postal_address_line_2, "district_id" => $request->district, "password" => Hash::make($request->password)]);
        $request->session()->put('school', value: $school);



        return redirect("/schools/dashboard")->with('success-message', 'School Registration Successful!');
    }



}
