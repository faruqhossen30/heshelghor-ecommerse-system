<?php

namespace App\Models\Merchant;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Order\DeliveryAddress;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'order_no', 'total_prodcut', 'total_item', 'product_price', 'delivery_cost', 'total_price', 'delivery_system_id', 'payment_method_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // Items
    public function itemProducts()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function deliveryaddress()
    {
        return $this->hasOne(DeliveryAddress::class, 'order_id', 'id');
    }


}
