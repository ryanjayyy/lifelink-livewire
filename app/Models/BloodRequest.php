<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'request_no',
        'blood_units',
        'blood_component_id',
        'diagnosis',
        'hospital',
        'transfusion_date',
        'request_status_id',
        'isPosted',
        'status',
    ];
}
