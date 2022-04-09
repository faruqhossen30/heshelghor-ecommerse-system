<?php

namespace App\Models\Admin\Courier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'author_id', 'status', 'dhaka_to_dhaka_price', 'all_place_price', 'dhaka_to_dhaka_per_kg', 'dhaka_to_outside_per_kg'];
}
