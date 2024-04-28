<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $psgcCode
 * @property string|null $regDesc
 * @property int|null $regCode
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region wherePsgcCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereRegCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereRegDesc($value)
 * @mixin \Eloquent
 */
class Region extends Model
{
    use HasFactory;
    protected $table = 'region';
}
