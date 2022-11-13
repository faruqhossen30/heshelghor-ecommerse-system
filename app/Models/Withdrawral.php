<?php

namespace App\Models;

use App\Models\Auth\Marchant;
use App\Models\Merchant\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Withdrawral extends Model
{
    use HasFactory;
    protected $fillable = ['amount','merchant_id', 'payment_id', 'description', 'status'];

       public function merchant()
       {
        return $this->hasOne(Marchant::class, 'id', 'merchant_id');
       }

       public function shop()
       {
       return $this->hasOne(Shop::class, 'id', 'shop_id');
       }

}
