<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'job_title', 'description', 'photo', 'vacancy', 'start_date', 'end_date', 'author_id', 'status'];
    protected $dates = ['start_date', 'end_date'];
}
