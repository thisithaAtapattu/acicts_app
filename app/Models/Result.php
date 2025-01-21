<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //


    protected $fillable = [
        'batch_student_id',
        'term',
        'subject_id',
        'mark',


        // 'status',
        // 'verification_code'



    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
