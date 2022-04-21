<?php

namespace App\Models\Admin\Courier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'code', 'description', 'author_id', 'status'];
}
