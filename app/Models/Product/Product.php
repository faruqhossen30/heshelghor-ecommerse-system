<?php

namespace App\Models\Product;

use App\Models\Auth\Marchant;
use App\Models\Merchant\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravelista\Comments\Commentable;
class Product extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia, Commentable;

    protected $fillable = ['title', 'description', 'short_description', 'slug', 'category_id', 'subcategory_id', 'subsub_category_id', 'brand_id', 'author', 'author_id', 'shop_id', 'division_id', 'district_id', 'upazila_id', 'regular_price', 'discount', 'price', 'quantity', 'quantity_alert', 'review', 'puk_code', 'photo', 'status', 'img_full', 'img_small', 'img_medium', 'img_large'];

    // Unique Slug generate
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

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
    public function shop()
    {
        return $this->hasOne(Shop::class, 'id', 'shop_id');
    }

    // Image
    public function images()
    {
        return $this->hasMany(ProductImgFull::class, 'product_id', 'id');
    }
    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
