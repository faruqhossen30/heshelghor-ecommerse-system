<?php

namespace App\Models\Admin\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'author_id', 'edit_author_id'];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
