<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignJobSubcontractor extends Model
{
    use HasFactory;

    protected $fillable = ['job_unique_id','sub_contractor_id','service_id','customer_id','order_id','status'];
}
