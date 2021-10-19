<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'order_no', 'total_prodcut', 'total_item', 'product_price', 'delivery_cost', 'total_price', 'delivery_system_id', 'payment_method_id'];

}
