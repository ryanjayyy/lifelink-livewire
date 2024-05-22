<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'sex_id',
        'gender',
        'blood_type_id',
        'diagnosis',
        'hospital_id',
        'dispensed_date'
    ];
}
