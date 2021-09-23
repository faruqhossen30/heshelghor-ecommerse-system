<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Category;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id','slug', 'commission'];

    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
