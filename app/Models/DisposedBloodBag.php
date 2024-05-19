<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposedBloodBag extends Model
{
    use HasFactory;
    protected $fillable = [
        'blood_bag_id',
        'disposed_date',
        'dispose_by',
    ];
}
