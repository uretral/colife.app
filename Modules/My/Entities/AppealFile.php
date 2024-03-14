<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $appeal_id
 * @property int $message_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $path
 * @property string|null $filename
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereAppealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AppealFile extends Model
{
    protected $connection = 'my';
    use HasFactory;

    protected     $guarded         = [];
    public static $snakeAttributes = false;
}
