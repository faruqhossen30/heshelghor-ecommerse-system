<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantProfile extends Model
{
    use HasFactory;
    protected $fillable = ['merchant_id', 'photo', 'nid_no', 'tradelicense_no', 'tin_no', 'nid_photo', 'tradelicense_photo', 'tin_photo'];
}
