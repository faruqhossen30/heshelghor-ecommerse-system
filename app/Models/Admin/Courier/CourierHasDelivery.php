<?php

namespace App\Models\Admin\Courier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierHasDelivery extends Model
{
    use HasFactory;
    protected $fillable = ['courier_id', 'distric_id', 'upazila_id'];
}
