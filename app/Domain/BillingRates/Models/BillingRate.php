<?php

namespace App\Domain\BillingRates\Models;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;

class BillingRate extends Model
{
    use CreatedBy;
    
    protected $table = 'billing_rates';

    protected $guarded = ['id'];

    protected $dates = ['wef'];
}
