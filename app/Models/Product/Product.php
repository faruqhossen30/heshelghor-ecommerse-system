<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'short_description', 'slug', 'category_id', 'subcategory_id', 'subsub_category_id', 'brand_id', 'author', 'author_id', 'shop_id', 'regular_price', 'sale_price', 'offer_price', 'price', 'quantity', 'quantity_alert', 'review', 'puk_code', 'image', 'status', 'colors', 'sizes'];


}
