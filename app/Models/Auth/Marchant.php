<?php

namespace App\Models\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Marchant extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('small')->keepOriginalImageFormat()
            ->width(250)
            ->height(250)
            ->sharpen(10);
        $this->addMediaConversion('medium')->keepOriginalImageFormat()
            ->width(500)
            ->height(500)
            ->sharpen(10);
        $this->addMediaConversion('large')->keepOriginalImageFormat()
            ->width(1000)
            ->height(1000)
            ->sharpen(10);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'password',
        'photo',
        'nid_no',
        'tradelicense_no',
        'tin_no',
        'nid_photo',
        'nid_photo',
        'tradelicense_photo',
        'tin_photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
