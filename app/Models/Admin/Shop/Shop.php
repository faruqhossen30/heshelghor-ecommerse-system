<?php

namespace App\Models\Admin\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'address', 'slug', 'trade_license', 'photo', 'market_id', 'division_id', 'district_id', 'upazila_id', 'author', 'author_id'];
}
