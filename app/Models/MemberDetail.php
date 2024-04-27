<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'occupation',
        'dob',
        'sex',
        'blood_type',
        'region',
        'province',
        'municipality',
        'barangay',
        'street',
        'zip_code',
    ];
}
