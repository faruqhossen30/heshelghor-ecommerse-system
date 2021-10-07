<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\SubCategory;
use App\Models\Product\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'slug'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function subcategoryList()
    {
        return $this->belongsTo(SubCategory::class, 'id', );
    }
}
