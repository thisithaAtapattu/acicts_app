<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'admission_no',
        'entered_date',
        'school_id',



    ];

}
