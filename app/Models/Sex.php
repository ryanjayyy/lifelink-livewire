<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $sex
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sex newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sex newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sex query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sex whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sex whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sex whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sex whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sex extends Model
{
    use HasFactory;
}
