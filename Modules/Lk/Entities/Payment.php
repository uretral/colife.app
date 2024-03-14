<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Modules\Lk\Entities\Payment
 *
 * @property int $id
 * @property int $purpose_id
 * @property int $status_id
 * @property int $amount
 * @property string|null $description
 * @property string|null $deadline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Lk\Entities\PaymentPurpose|null $purpose
 * @property-read \Modules\Lk\Entities\PaymentStatus|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePurposeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @property string|null $payed_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePayedAt($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $connection = 'tenant';
    public $incrementing = false;
    public static $snakeAttributes = false;
    protected $with = ['purpose','status'];

    public function purpose(): HasOne
    {
        return $this->hasOne(PaymentPurpose::class,'id','purpose_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(PaymentStatus::class,'id','status_id');
    }
}
