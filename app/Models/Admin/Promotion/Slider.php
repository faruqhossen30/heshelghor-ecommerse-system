<?php

namespace App\Models\Admin\Promotion;

use App\Events\Frontend\SliderdeleteEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'image',
        'category_id',
        'sub_category_id',
        'author_id',
    ];

    protected $dispatchesEvents = [
        'created' => SliderdeleteEvent::class,
        'deleted' => SliderdeleteEvent::class
    ];
}
