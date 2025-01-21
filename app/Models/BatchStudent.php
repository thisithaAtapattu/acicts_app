<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchStudent extends Model
{
    //

    protected $fillable = [
        'batch_id',
        'student_id',


        // 'status',
        // 'verification_code'



    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
