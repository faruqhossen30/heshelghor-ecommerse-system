<?php

namespace App\Models\Admin\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Location\Division;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'division_id'];

    public function getDivision()
    {
        return $this->hasOne(Division::class, 'id', 'division_id');
    }
}
