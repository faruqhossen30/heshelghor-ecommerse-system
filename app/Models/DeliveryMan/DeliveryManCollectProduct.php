<?php

namespace App\Models\DeliveryMan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryManCollectProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'invoice_id', 'orderitem_id', 'shop_id', 'pointmanager_id', 'pmcp_id', 'commission', 'total_commission', 'accept_status', 'accept_time', 'deliveryman_id'];

    protected $dates = ['accept_time'];
}
