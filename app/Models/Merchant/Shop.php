<?php

namespace App\Models\Merchant;

use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use App\Models\Admin\Market;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Shop extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['name', 'description', 'address', 'mobile', 'slug', 'trade_license', 'image', 'photo', 'market_id', 'division_id', 'district_id', 'upazila_id', 'author', 'author_id', 'img_full', 'img_small', 'img_medium', 'img_large'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function market()
    {
        return $this->hasOne(Market::class, 'id', 'market_id');
    }
    public function division()
    {
        return $this->hasOne(Division::class, 'id', 'division_id');
    }
    public function district()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }
    public function upazila()
    {
        return $this->hasOne(Upazila::class, 'id', 'upazila_id');
    }


}
