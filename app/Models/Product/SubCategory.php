<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Category;
use Cviebrock\EloquentSluggable\Sluggable;

class SubCategory extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['name', 'category_id', 'description', 'slug', 'commission', 'image', 'author_id','photo'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
