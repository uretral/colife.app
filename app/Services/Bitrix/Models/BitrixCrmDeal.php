<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Services\Bitrix\Models\BitrixCrmDeal
 *
 * @property int $id
 * @property int|null $bx_id
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Services\Bitrix\Models\BitrixCrmDealCategories|null $category
 * @property-read \App\Services\Bitrix\Models\BitrixCrmContact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmDealFields> $fields
 * @property-read int|null $fields_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmDealFields> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @mixin \Eloquent
 */
class BitrixCrmDeal extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_deals';

    protected $with = ['category'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $fillable = [
        'bx_id',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function category(): BelongsTo
    {
        return $this->belongsTo(BitrixCrmDealCategories::class, 'category_id', 'bx_id');
    }

    public function fields()
    {
        return BitrixCrmFields::whereModel(self::class)->get();
    }

    public function contact(): HasOneThrough
    {
        return $this->HasOneThrough(BitrixCrmContact::class,BitrixCrmDealFields::class);
    }

    public function values(): BelongsToMany
    {

        return $this->belongsToMany(BitrixCrmFields::class,
            'crm_deal_values','deal_id',
            'field_id','id','id')
            ->where('deal_id', $this->id)
            ->withPivot('value')
            ->using(BitrixCrmDealValue::class);
    }

    public function stage(): Attribute {

        return Attribute::make(
            get: fn ($value, $attributes) => \Str::of($this->values()->where('field_id', 5)->first()->pivot->value)
                ->explode(":")
                ->last(),
        );
    }
}
