<?php

namespace App\Models\Admin\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Upazila;

class DeliveryAddress extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id', 'order_id', 'email', 'company', 'address', 'message', 'zip_code', 'mobile', 'division_id', 'district_id', 'upazila_id',];

    public function district()
    {
        return $this->hasOne(Division::class, 'division_id', 'id');
    }
}
