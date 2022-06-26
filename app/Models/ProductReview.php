<?php

namespace App\Models;

use App\Models\Merchant\OrderItem;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'product_id',
        'orderitem_id',
        'body',
        'rating',
        'recommend',
    ];

    public function orderitem()
    {
        return $this->hasOne(OrderItem::class, 'id', 'product_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
