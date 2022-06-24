<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubContractor extends Model
{
    use HasFactory;

    protected $fillable =['sub_contractors_unique_id','name','email','mobile','sub_contractors_image','past_jobs','past_job_cost'];
}
