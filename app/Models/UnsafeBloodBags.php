<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnsafeBloodBags extends Model
{
    use HasFactory;

    protected $fillable = [
        'blood_bag_id',
        'reason_id',
        'remarks'
    ];
}
