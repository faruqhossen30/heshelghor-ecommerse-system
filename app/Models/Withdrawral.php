<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawral extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'payment_id', 'description', 'status'];

}
