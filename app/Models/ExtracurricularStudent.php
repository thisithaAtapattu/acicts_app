<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtracurricularStudent extends Model
{


    protected $fillable = [
        'student_id',
        'extracurricular_id',



    ];


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class, 'extracurricular_id');
    }



}
