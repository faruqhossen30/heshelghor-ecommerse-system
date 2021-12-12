<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingHeader extends Model
{
    use HasFactory;
    protected $fillable = ['logo', 'quate', 'email', 'mobile'];
}
