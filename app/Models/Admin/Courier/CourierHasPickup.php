<?php

namespace App\Models\Admin\Courier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierHasPickup extends Model
{
    use HasFactory;
    protected $fillable = ['courier_id', 'division_id', 'district_id', 'upazila_id'];
}
