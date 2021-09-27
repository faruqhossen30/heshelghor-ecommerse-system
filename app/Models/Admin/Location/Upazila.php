<?php

namespace App\Models\Admin\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\District;

class Upazila extends Model
{
    use HasFactory;
    protected $fillable = ['division_id', 'district_id', 'name'];

    public function getDistrict()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    public function getDivision()
    {
        return $this->hasOne(Division::class, 'id', 'division_id');
    }
}
