<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Lk\Entities\PaymentStatus
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PaymentStatus extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $connection = 'tenant';
    public $incrementing = false;
    public static $snakeAttributes = false;
}
