<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Services\Bitrix\Models\BitrixCrmStatus
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatus query()
 * @mixin \Eloquent
 */
class BitrixCrmStatus extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $fillable = ['ext_id','statusType_id','status_id',];

    public $timestamps = false;

}
