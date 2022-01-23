<?php

namespace App\Models\Admin\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];


    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
