<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispenseList extends Model
{
    use HasFactory;

    protected $table = 'dispense_lists';

    protected $fillable = [
        'blood_bag_id',
        'patient_details_id',
    ];
}
