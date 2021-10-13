<?php

namespace App\Models\Product;

use App\Models\Admin\Attribute\Color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $fillable = ['color_id', 'product_id'];

    public function color()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
}
