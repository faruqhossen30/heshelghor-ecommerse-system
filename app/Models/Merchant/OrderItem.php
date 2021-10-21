<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'merchant_id', 'order_id', 'product_id', 'regular_price', 'discount', 'price', 'quantity', 'color', 'size', 'order_No', 'delivery_system_id', 'payment_method_id', 'status'
    ];
}
