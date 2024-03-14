<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property int $request_id
 * @property int $message_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $path
 * @property string|null $filename
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RequestFile extends Model
{
    protected $connection = 'my';
    use HasFactory;

    protected     $guarded         = [];
    public static $snakeAttributes = false;
}
