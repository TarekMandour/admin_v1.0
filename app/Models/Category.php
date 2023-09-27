<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function services()
    {
        return $this->HasMany(Service::class, 'category_id');
    }

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaCollection('photo')
        ->singleFile();

        $this->addMediaConversion('thumb')
        ->keepOriginalImageFormat()
        ->crop('crop-center', 30, 30);
    }
}
