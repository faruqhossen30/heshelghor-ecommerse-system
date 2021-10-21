<?php

namespace App\Models\Product;

use App\Models\Admin\Attribute\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $fillable = ['size_id', 'product_id'];

    public function size()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }
}
