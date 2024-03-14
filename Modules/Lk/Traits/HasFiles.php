<?php


namespace Modules\Lk\Traits;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Lk\Entities\File;

/**
 * Файловый трейт
 * Trait HasFiles
 * @package  Modules\Lk\Traits;
 */
trait HasFiles
{
    public function createFile(array $attributes = [])
    {
        if (empty($attributes['type'])) {
            $attributes['type'] = $this->default_file_type;
        }

        $file_prefix = null;
        $model = $this;
        while (! $file_prefix) {
            if (method_exists($model, 'getFilePrefixAttribute')) {
                $file_prefix = $model->getFilePrefixAttribute();
            } elseif (isset($model->file_prefix)) {
                $file_prefix = $model->file_prefix;
            } elseif (method_exists($model, 'model')) {
                $model = $model->owner;
            } else {
                $file_prefix = 'files';
            }
        }

        $file_prefix = rtrim($file_prefix, '/') . '/';

        if (empty($attributes['disk'])) {
            if (isset($this->disk)) {
                $attributes['disk'] = $this->disk;
            } else {
                $attributes['disk'] = 'local';
            }
        }

        if (empty($attributes['key'])) {
            $name = $attributes['name'] ?? Str::uuid();
            $attributes['key'] = $file_prefix . $name;
            $attributes['url'] = Storage::disk($attributes['disk'])->url($attributes['key']);
        }

        $storage = Storage::disk($attributes['disk']);

        if (! empty($attributes['base64'])) {
            $attributes['contents'] = base64_decode($attributes['base64']);
        }

        if (! empty($attributes['contents'])) {
            $storage->put($attributes['key'], $attributes['contents']);
            $attributes['checksum'] = hash("md5", ($attributes['contents']));
        }

        $file_attributes = [];

        foreach (['type', 'name', 'title', 'checksum'] as $field) {
            if (! empty($attributes[$field])) {
                $file_attributes[$field] = $attributes[$field];
            }
        }

        return $this->files()->updateOrCreate([
            'disk' => $attributes['disk'],
            'key' => $attributes['key'],
        ], $attributes);
    }

    public function files($type = null)
    {
        if ($type) {
            return $this->morphMany(File::class, 'model')->whereType($type);
        }

        return $this->morphMany(File::class, 'model');
    }

    public function file($type = null)
    {
        $type = $type ?: $this->default_file_type;

        return $this->morphOne(File::class, 'model')->whereType($type)->sole();
    }

    public function getFileAttribute()
    {
        return $this->files($this->default_file_type)->sole();
    }

    public function getDefaultFileTypeAttribute()
    {
        if (defined(get_class($this) . '::FILE_TYPE_DEFAULT')) {
            return get_class($this)::FILE_TYPE_DEFAULT;
        }

        return File::TYPE_DEFAULT;
    }

}
