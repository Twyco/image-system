<?php

namespace Twyco\ImageSystem\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Twyco\ImageSystem\Models\Image;
class ImageService
{
    public function __construct(protected string $disk = 'public') {}

    public function store(UploadedFile $file, ?Model $owner = null): Image
    {
        $time = time();
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filename = 'images/'.$originalName.'_'.$time.'.'.$file->getClientOriginalExtension();
        Storage::disk($this->disk)->put($filename, file_get_contents($file));

        $image = new Image(['image_path' => $filename]);

        if ($owner) {
            $image->owner()->associate($owner);
        }
        $image->save();

        return $image;
    }
}