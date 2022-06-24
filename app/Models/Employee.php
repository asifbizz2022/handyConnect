<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;

class Employee extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'image',
        'vendor_id',
        'user_id',
        'designation_id',
        'role_id',
        'address',
        'zip_code',
        'city',
        'country',
        'past_job_id',
    ];
}