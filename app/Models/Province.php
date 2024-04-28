<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $psgcCode
 * @property string|null $provDesc
 * @property int|null $regCode
 * @property int|null $provCode
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereProvCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereProvDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province wherePsgcCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereRegCode($value)
 * @mixin \Eloquent
 */
class Province extends Model
{
    use HasFactory;
    protected $table = 'province';
}
