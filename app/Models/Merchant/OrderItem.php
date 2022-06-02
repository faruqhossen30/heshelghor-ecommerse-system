<?php

namespace App\Models\Merchant;

use App\Models\Admin\Courier\Courier;
use App\Models\Admin\Order\DeliveryAddress;
use App\Models\Auth\Marchant;
use App\Models\Product\Product;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'user_id', 'product_id', 'merchant_id', 'shop_id', 'order_number', 'quantity', 'price', 'discount_type', 'discount', 'varient', 'courier_id', 'courier_packege_desc', 'delivery_cost', 'total_delivery_cost', 'accept_status', 'cancel_status', 'courier_status', 'complete_status', 'order_pin_no', 'accepted_at', 'canceled_at', 'author', 'admin_id', 'courier_authorid', 'complete_authorid', 'couriered_at', 'completed_at'
    ];

    protected $dates = ['accepted_at', 'canceled_at', 'completed_at', 'couriered_at'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
    public function shop()
    {
        return $this->hasOne(Shop::class, 'id', 'shop_id');
    }
    public function merchant()
    {
        return $this->hasOne(Marchant::class, 'id' , 'merchant_id' );
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id' , 'user_id' );
    }
    public function courier()
    {
        return $this->hasOne(Courier::class, 'id' , 'courier_id' );
    }
    public function review()
    {
        return $this->hasOne(ProductReview::class, 'id' , 'product_id' );
    }

}
