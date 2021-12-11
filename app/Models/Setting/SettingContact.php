<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingContact extends Model
{
    use HasFactory;
    protected $fillable = ['phone', 'mobile', 'email', 'address', 'working_day', 'working_time'];
}
