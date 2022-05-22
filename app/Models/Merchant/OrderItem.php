<?php

namespace App\Models\Merchant;

use App\Models\Admin\Order\DeliveryAddress;
use App\Models\Auth\Marchant;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'user_id', 'product_id', 'merchant_id', 'shop_id', 'order_number', 'quantity', 'price', 'discount_type', 'discount', 'varient', 'courier_id', 'courier_packege_desc', 'delivery_cost', 'total_delivery_cost', 'order_status', 'cancel_status', 'order_pin_no'
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
        return $this->hasOne(DeliveryAddress::class, 'order_id', 'order_id');
    }
    public function merchant()
    {
        return $this->hasOne(Marchant::class, 'id' , 'merchant_id' );
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id' , 'user_id' );
    }

}
