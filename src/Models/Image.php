<?php

namespace Twyco\ImageSystem\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property int $owner_id
 * @property string $owner_type
 * @property mixed $owner
 * @property string $image_path
 * @property string $file
 * @property string $url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Image extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'owner_id',
        'owner_type',
        'image_path',
    ];

    public function owner(): MorphTo
    {
        return $this->morphTo();
    }

    public function getFileAttribute()
    {
        return Storage::disk(config('image-system.disk', 'public'))->get($this->image_path);
    }

    public function getUrlAttribute()
    {
        return Storage::disk(config('image-system.disk', 'public'))->url($this->image_path);
    }

    public function deleteFileFromStorage()
    {
        Storage::disk(config('image-system.disk', 'public'))->delete($this->image_path);
    }
}
