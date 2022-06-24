<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricelist_With_Categories extends Model
{
    use HasFactory;
    protected $fillable =['categories','type_of_work'];
}
