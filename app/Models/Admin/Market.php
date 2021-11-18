<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Market extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['name', 'description', 'address', 'slug', 'image', 'division_id', 'district_id', 'upazila_id', 'author', 'author_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
