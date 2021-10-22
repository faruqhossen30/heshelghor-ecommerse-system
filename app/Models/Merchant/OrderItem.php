<?php

namespace App\Models\Merchant;

use App\Models\Admin\Order\DeliveryAddress;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'merchant_id', 'order_id', 'product_id', 'regular_price', 'discount', 'price', 'quantity', 'color', 'size', 'order_No', 'delivery_system_id', 'payment_method_id', 'status'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
    public function deliveryaddress()
    {
        return $this->hasOne(DeliveryAddress::class, 'id', 'order_id');
    }

}
