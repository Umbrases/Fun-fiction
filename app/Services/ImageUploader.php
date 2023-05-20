<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploader
{
    /**
     * Save uploaded image.
     *
     * @param UploadedFile $imageData
     * @return bool
     */
    static function save(UploadedFile $imageData)
    {
        return Storage::disk('public')->put('/images', $imageData);
    }
}
