<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchGift extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaCollection('gifts');

        $this->addMediaConversion('thumb')
        ->keepOriginalImageFormat()
        ->crop('crop-center', 600, 400);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

}
