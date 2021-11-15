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
        'user_id', 'merchant_id', 'order_id', 'order_number', 'product_id', 'regular_price', 'discount', 'price', 'quantity', 'merchant_price', 'merchant_price_total', 'delivery_cost', 'total_delivery_cost', 'color', 'size', 'order_no', 'delivery_system_id', 'payment_method_id', 'order_status', 'merchant_status', 'colect_pointmanager_status', 'colect_deliveryman_status', 'vehicle_status', 'delivery_pointmanager_status', 'deliveryman_status', 'user_accept_status', 'order_pin_no'
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
