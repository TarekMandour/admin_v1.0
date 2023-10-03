<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at', 'updated_at'];

    public function cities() : HasMany
    {
        return $this->hasMany(City::class);
    }

}
