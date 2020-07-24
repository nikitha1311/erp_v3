<?php

namespace App\Domain\Customers\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['name','code','address','is_consignor','is_consignee','is_billed_on'];
}
