<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaCollection('photo');

        $this->addMediaConversion('thumb')
        ->keepOriginalImageFormat()
        ->crop('crop-center', 600, 400);
    }

    public function getAppendTitleAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->title_ar;
        } else {
            return $this->title_en;
        }
    }

    public function getAppendDescriptionAttribute()
    {
        if ($locale = App::getLocale() == "ar") {
            return $this->description;
        } else {
            return $this->description_en;
        }
    }

}
