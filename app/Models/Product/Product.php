<?php

namespace App\Models\Product;

use App\Models\Auth\Marchant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'short_description', 'slug', 'category_id', 'subcategory_id', 'subsub_category_id', 'brand_id', 'author', 'author_id', 'shop_id', 'regular_price', 'discount', 'price', 'quantity', 'quantity_alert', 'review', 'puk_code', 'photo', 'status'];

    // Category
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    // subCategory
    public function subcategory()
    {
        return $this->hasOne(SubCategory::class, 'id', 'subcategory_id');
    }


    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function merchant()
    {
        return $this->hasOne(Marchant::class, 'id', 'author_id');
    }

  // Image
  public function images()
  {
      return $this->hasMany(ProductImage::class, 'product_id', 'id');
  }


}
