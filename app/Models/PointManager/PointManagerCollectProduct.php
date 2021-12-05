<?php

namespace App\Models\PointManager;

use App\Models\Admin\Order\DeliveryAddress;
use App\Models\Merchant\OrderItem;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointManagerCollectProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'invoice_id', 'orderitem_id', 'delivery_address_id', 'commission', 'total_commission', 'mobile', 'address', 'pointmanager_id', 'accept_time'];

    protected $dates = ['accept_time'];

    public function orderitem()
    {
        return $this->hasOne(OrderItem::class, 'id', 'orderitem_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function deliveryaddress()
    {
        return $this->hasOne(DeliveryAddress::class, 'order_id', 'invoice_id');
    }


}
