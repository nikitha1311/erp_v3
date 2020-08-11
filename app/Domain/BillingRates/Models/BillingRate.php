<?php

namespace App\Domain\BillingRates\Models;
use App\Domain\Routes\Models\Route;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class BillingRate extends Model implements AuditableContract
{
    use CreatedBy,Auditable;

    protected $table = 'billing_rates';

    protected $guarded = ['id'];

    protected $dates = ['wef'];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
