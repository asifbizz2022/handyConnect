<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandyConnectQuotation extends Model
{
    use HasFactory;

    protected $fillable=['quotation_unique_no', 'customer_id','hc_cat_id','logo','address','postalcode','company_registration_no','work_description','price_per_unit','total_price','unit_quantity','tax','tax_price','final_price_with_tax']
}
