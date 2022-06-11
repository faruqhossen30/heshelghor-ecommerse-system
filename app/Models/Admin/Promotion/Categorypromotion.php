<?php

namespace App\Models\Admin\Promotion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorypromotion extends Model
{
    use HasFactory;

    protected $fillable = [

       'sub_category_id',
        'author_id',
    ];
}
