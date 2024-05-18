<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBag extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'donation_type_id',
        'venue_id',
        'bled_by_id',
        'serial_no',
        'date_donated',
        'expiration_date',
        'isCollected',
        'isTested',
        'isStored',
        'isUsed',
        'isExpired',
        'dispensed_date',
    ];
}
