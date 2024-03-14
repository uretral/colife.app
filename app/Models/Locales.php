<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lang
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property int|null $is_default
 * @property string $title
 * @property string $code
 * @property string|null $abbr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Locales newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locales newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locales query()
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereAbbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Locales extends Model
{
    use HasFactory;

    protected $fillable = [];

}
