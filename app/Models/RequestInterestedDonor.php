<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInterestedDonor extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_post_id',
        'blood_request_id',
        'user_id',
    ];
}
