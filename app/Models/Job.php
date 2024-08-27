<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'job_title', 'date', 'salary', 'location', 'description', 'emp_id', 'cat_id'
    ];
}
