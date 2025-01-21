<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    //

    protected $table = "classes";


    protected $fillable = [
        'name',
        'grade',
        'school_id',
        'teacher_id',




    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
