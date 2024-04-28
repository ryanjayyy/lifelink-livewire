<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $module
 * @property string $action
 * @property string $status
 * @property string $ip_address
 * @property string $region
 * @property string $city
 * @property string $postal
 * @property string $latitude
 * @property string $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail wherePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereUserId($value)
 * @mixin \Eloquent
 */
class AuditTrail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module',
        'action',
        'status',
        'ip_address',
        'region',
        'city',
        'postal',
        'latitude',
        'longitude',
    ];
}
