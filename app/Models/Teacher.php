<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    //
    protected $primaryKey = "id";



    protected $fillable = [
        'first_name',
        'last_name',
        'nic_no',

        'email',
        'contact_no',
        'password',
        'school_id',
        'status',
        'verification_code'



    ];


    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function schoolClass()
    {

        return $this->hasOne(SchoolClass::class, "teacher_id");
    }
}
