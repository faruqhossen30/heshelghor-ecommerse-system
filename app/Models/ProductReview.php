<?php

namespace App\Models;

use App\Models\Merchant\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_id',
        'user_id',
        'body',
        'rating',
        'recommend',
    ];

    public function orderitem()
    {
        return $this->hasOne(OrderItem::class, 'id', 'product_id');
    }
}
