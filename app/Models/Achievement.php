<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    //


    protected $fillable = [
        'event_id',
        'extracurricular_student_id',
        'place',


    ];

    public function extracurricularStudent()
    {
        return $this->belongsTo(ExtracurricularStudent::class, 'extracurricular_student_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }


}
