<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Services\Bitrix\Models\BitrixCrmContactFields
 *
 * @property int $id
 * @property string|null $bx_name
 * @property string|null $type
 * @property string|null $title
 * @property string|null $label
 * @property int|null $isRequired
 * @property int|null $isMultiple
 * @property int|null $isDynamic
 * @property mixed|null $settings
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereIsDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereIsMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereType($value)
 * @mixin \Eloquent
 */
class BitrixCrmContactFields extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_contact_fields';

    public $timestamps = false;

    protected $fillable = [
        'bx_name',
        'type',
        'title',
        'label',
        'isRequired',
        'isMultiple',
        'isDynamic',
        'settings',
    ];

    protected $hidden = ['id','created_at','updated_at'];

    protected $casts = [
        'settings' => 'array'
    ];
}
