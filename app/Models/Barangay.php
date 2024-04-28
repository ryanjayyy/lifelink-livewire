<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $brgyCode
 * @property string|null $brgyDesc
 * @property string|null $regCode
 * @property int|null $provCode
 * @property int|null $citymunCode
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay query()
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereBrgyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereBrgyDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereCitymunCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereProvCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereRegCode($value)
 * @mixin \Eloquent
 */
class Barangay extends Model
{
    use HasFactory;
    protected $table = 'barangay';
}
