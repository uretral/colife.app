<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lk\Traits\HasTranslation;

/**
 * Modules\Lk\EntitiesPaymentPurpose
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property string $color
 * @property string $bg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereUpdatedAt($value)
 * @property string|null $icon_filter
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereIconFilter($value)
 * @mixin \Eloquent
 */
class PaymentPurpose extends Model
{
    use HasFactory, HasTranslation;

    protected $guarded = [];
    protected $connection = 'tenant';
    public $incrementing = false;
    public static $snakeAttributes = false;

    protected $with = ['content'];
}
