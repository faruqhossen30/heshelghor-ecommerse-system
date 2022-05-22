<?php

namespace App\Models\Merchant;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Order\DeliveryAddress;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'invoice_number', 'total_item', 'total_prodcut', 'total_product_price', 'total_delivery_cost', 'payment_type', 'name', 'email', 'phone', 'amount', 'status', 'address', 'transaction_id', 'currency', 'note', 'division_id', 'district_id', 'upazila_id'];

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
