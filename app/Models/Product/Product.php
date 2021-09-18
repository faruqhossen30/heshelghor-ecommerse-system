<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'short_description', 'slug', 'category_id', 'brand_id', 'subcatagory_id', 'marchant_id', 'vendor_id', 'buy_price', 'regular_price', 'sale_price', 'quantity', 'puk_code', 'image', 'status'];

}
