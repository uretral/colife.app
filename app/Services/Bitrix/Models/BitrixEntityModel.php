<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * App\Services\Bitrix\Models\BitrixEntityModel
 *
 * @property int $id
 * @property string|null $entityId Сущность Битрикс: https://dev.1c-bitrix.ru/rest_help/userfieldconfig/entityId.php
 * @property string|null $model Наименование модели Laravel
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel whereModel($value)
 * @mixin \Eloquent
 */
class BitrixEntityModel extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'entity_models';

    protected $fillable = [
        'entityId',
        'model',
    ];

    public $timestamps = false;

}
