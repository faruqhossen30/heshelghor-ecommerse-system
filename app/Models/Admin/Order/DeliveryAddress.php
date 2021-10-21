<?php

namespace App\Models\Admin\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id', 'order_id', 'email', 'company', 'address', 'message', 'zip_code', 'mobile', 'division_id', 'district_id', 'upazila_id',];
}
