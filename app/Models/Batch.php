<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    //


    protected $fillable = [
        'class_id',
        'from_date',
        'to_date',
        'teacher_id',

        // 'status',
        // 'verification_code'



    ];

    protected $table = "batches";

}
