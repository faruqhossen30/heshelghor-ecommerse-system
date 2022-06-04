<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'image', 'slug', 'author', 'author_id', 'img_full', 'img_small', 'img_medium', 'img_large'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
