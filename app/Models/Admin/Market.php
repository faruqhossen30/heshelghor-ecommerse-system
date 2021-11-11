<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'address', 'slug', 'image', 'division_id', 'district_id', 'upazila_id', 'author', 'author_id'];
}
