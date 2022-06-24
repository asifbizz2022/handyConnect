<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id','customer_unique_id','service_unique_id','quotation_unique_id','order_status'
    ];
    public function Service()
    {
        return $this->hasOne(Service::class,'id','service_unique_id');
    }
    public function Customer()
    {
        return $this->hasOne(Customer::class,'customer_unique_id','customer_unique_id');
    }
    public function Status()
    {
        return $this->hasOne(Status::class,'order_status','order_status');
    }
}
