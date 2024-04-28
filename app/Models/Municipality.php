<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $psgcCode
 * @property string|null $citymunDesc
 * @property int|null $regDesc
 * @property int|null $provCode
 * @property int|null $citymunCode
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality query()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereCitymunCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereCitymunDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereProvCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality wherePsgcCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereRegDesc($value)
 * @mixin \Eloquent
 */
class Municipality extends Model
{
    use HasFactory;
    protected $table = 'municipality';

}
