<?php

namespace App\Models\User;

use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserorderComplain extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderitem_id',
        'product_id',
        'user_id',
        'complain_number',
        'order_number',
        'delivery_date',
        'delivery_time',
        'customer_name',
        'customer_email',
        'customer_mobile',
        'customer_address',
        'alt_customer_name',
        'alt_customer_phone',
        'alt_customer_email',
        'alt_customer_address',
        'complain_message',
        'defect_pic_1',
        'defect_pic_2',
        'defect_pic_3',
        'defect_pic_4',
        'defect_pic_5',
   ];

   protected $dates = ['delivery_date', 'delivery_time'];

   public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
    public function orderitem()
    {
        return $this->hasOne(OrderItem::class, 'id', 'orderitem_id');
    }
}
