<?php

namespace App\Models\PointManager;

use App\Models\Admin\Order\DeliveryAddress;
use App\Models\Merchant\OrderItem;
use App\Models\Merchant\Shop;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointManagerCollectProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'invoice_id', 'orderitem_id', 'shop_id', 'pointmanager_id', 'commission', 'total_commission', 'accept_status', 'accept_time', 'deliveryman_status', 'deliveryman_accept_time', 'deliveryman_id', 'product_receive_status', 'product_receive_time'];

    protected $dates = ['accept_time', 'product_receive_time', 'deliveryman_accept_time'];

    public function orderitem()
    {
        return $this->hasOne(OrderItem::class, 'id', 'orderitem_id');
    }
    public function shop()
    {
        return $this->hasOne(Shop::class, 'id', 'shop_id');
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
