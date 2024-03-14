<?php


namespace Modules\My\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Modules\My\Traits\HasTranslation;

class File extends Model
{

    protected $connection = "my";

    protected $table = "files";

    public const TYPE_DEFAULT = 'default';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = ['model_id', 'model_type'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'model_id', 'model_type'];

    public function getTable()
    {
        return $this->table;
    }

    public function model()
    {
        return $this->morphTo();
    }

    public function getBase64Attribute()
    {
        return base64_encode($this->contents);
    }

    public function setBase64Attribute($data)
    {
        return $this->setContentsAttribute(base64_decode($data));
    }

    public function getContentsAttribute()
    {
        return $this->exists() ? Storage::disk($this->disk)->get($this->key) : null;
    }

    public function setContentsAttribute($contents)
    {
        return Storage::disk($this->disk)->put($this->key, $contents);
    }

    public function getUrlAttribute()
    {
        return Storage::disk($this->disk)->url($this->key);
    }

    public function getLinkAttribute()
    {
        return $this->url ?? "";
    }

    public function exists()
    {
        return Storage::disk($this->disk)->exists($this->key);
    }

    public function __toString()
    {
        return $this->url;
    }
}
