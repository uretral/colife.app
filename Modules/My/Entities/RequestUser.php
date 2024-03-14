<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 * @property int $id
 * @property int|null $request_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereUserId($value)
 * @mixin \Eloquent
 */
class RequestUser extends Model
{
    use HasFactory;

    protected $connection = 'my';
    protected $guarded    = [];
    protected $fillable   = ["user_id", "request_id"];


}
