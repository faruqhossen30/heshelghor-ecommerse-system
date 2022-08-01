<?php

namespace App\Models\Admin\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $fillable = ['attribute_id', 'value', 'author_id', 'edit_author_id'];
}
