<?php

namespace App\Domain\BillingRates\Models;
use App\Domain\Routes\Models\Route;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;

class BillingRate extends Model
{
    use CreatedBy;

    protected $table = 'billing_rates';

    protected $guarded = ['id'];

    protected $dates = ['wef'];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
