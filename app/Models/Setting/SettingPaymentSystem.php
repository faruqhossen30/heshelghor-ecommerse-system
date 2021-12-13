<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingPaymentSystem extends Model
{
    use HasFactory;

    protected $fillable = ['payment_method_id'];
}
