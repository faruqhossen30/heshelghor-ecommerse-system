<?php

namespace App\Models;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'user_id', 'ip', 'photo', 'mobile'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
