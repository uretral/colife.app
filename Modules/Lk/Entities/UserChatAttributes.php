<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\UserChatAttributes
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $img
 * @property string|null $bx_chat_user_id
 * @property string|null $bx_personal_user_id
 * @property string|null $title
 * @property string|null $initials
 * @property string|null $color
 * @property string|null $bg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBxChatUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereInitials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereUserId($value)
 * @mixin \Eloquent
 */
class UserChatAttributes extends Model
{
    use HasFactory;

    protected $connection = "tenant";
    protected $table = "user_chat_attributes";
    public static $snakeAttributes = false;
    protected $fillable = [
        "user_id","img","title","initials","color","bg","created_at","bx_chat_user_id","bx_personal_user_id","updated_at"
    ];
}
