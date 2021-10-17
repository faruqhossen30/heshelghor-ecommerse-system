<?php

namespace App\Models\Admin\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverySystem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'author_id',
        'status',
    ];
}
