<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Services\Bitrix\Models\BitrixCrmDealCategories
 *
 * @property int $id
 * @property int|null $bx_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $slug
 * @property-read \App\Services\Bitrix\Models\BitrixCrmDeal|null $deal
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereTitle($value)
 * @mixin \Eloquent
 */
class BitrixCrmDealCategories extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_deal_categories';

    protected $hidden = ['id'];

    protected $fillable = [
        'bx_id',
        'title',
        'description',
        'slug',
    ];

    public $timestamps = false;

    public function deal(): HasOne
    {
        return $this->hasOne(BitrixCrmDeal::class, 'category_id', 'bx_id');
    }

}
