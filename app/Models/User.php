<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\App;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'phone',
        'password', 'email',
        'national_id', 'address',
        'neighborhood_id',
        'city_id','country_id',
        'branch_id','is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tickets () {
        $this->hasMany(Contact::class);
    }

    public function country():BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function city():BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function branch():BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }


}
