<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id','name_ar', 'description_ar', 'vision_ar', 'mission_ar', 'massage_ar', 'name_en',
        'description_en', 'vision_en', 'mission_en', 'massage_en', 'created_at', 'updated_at'];

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaCollection('photo')
        ->singleFile();

        $this->addMediaConversion('thumb')
        ->keepOriginalImageFormat()
        ->crop('crop-center', 370, 520);

        $this->addMediaCollection('photo2')
        ->singleFile();

        $this->addMediaConversion('thumb2')
        ->keepOriginalImageFormat()
        ->crop('crop-center', 270, 350);
    }
}
