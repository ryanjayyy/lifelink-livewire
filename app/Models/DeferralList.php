<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeferralList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date_deffered',
        'deferral_type_id',
        'deferral_category_id',
        'other_reason',
        'deferral_duration',
        'end_date',
        'status',
    ];
}
