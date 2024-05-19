<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispenseList extends Model
{
    use HasFactory;

    protected $table = 'dispensed_lists';
    protected $fillable = [
        'blood_bag_id',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'sex_id',
        'gender',
        'blood_type_id',
        'diagnosis',
        'hospital_id',
    ];
}
