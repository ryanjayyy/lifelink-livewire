<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property int $donor_number
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $sex_id
 * @property string $dob
 * @property string $blood_type
 * @property string|null $occupation
 * @property string $region
 * @property string $province
 * @property string $municipality
 * @property string $barangay
 * @property string $street
 * @property string $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereBarangay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereBloodType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereDonorNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereMunicipality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereSexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereZipCode($value)
 * @mixin \Eloquent
 */
class MemberDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'donor_number',
        'first_name',
        'middle_name',
        'last_name',
        'occupation',
        'dob',
        'sex_id',
        'blood_type_id',
        'region',
        'province',
        'municipality',
        'barangay',
        'street',
        'zip_code',
    ];
}
