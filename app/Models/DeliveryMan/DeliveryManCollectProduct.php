<?php

namespace App\Models\DeliveryMan;

use App\Models\Admin\Order\DeliveryAddress;
use App\Models\Merchant\OrderItem;
use App\Models\Merchant\Shop;
use App\Models\PointManager\Pointmanager;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryManCollectProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'invoice_id', 'orderitem_id', 'shop_id', 'pointmanager_id', 'pmcp_id', 'commission', 'total_commission', 'accept_status', 'accept_time', 'deliveryman_id', 'pointmanager_receive_status', 'pointmanager_receive_time'];

    protected $dates = ['accept_time', 'pointmanager_receive_time'];

    public function orderitem()
    {
        return $this->hasOne(OrderItem::class, 'id', 'orderitem_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function shop()
    {
        return $this->hasOne(Shop::class, 'id', 'shop_id');
    }
    public function point()
    {
        return $this->hasOne(Pointmanager::class, 'id', 'pointmanager_id');
    }

    public function deliveryaddress()
    {
        return $this->hasOne(DeliveryAddress::class, 'order_id', 'invoice_id');
    }
}
