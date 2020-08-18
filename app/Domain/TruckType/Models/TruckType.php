<?php

namespace App\Domain\TruckType\Models;

use App\Domain\LHAs\Models\LoadingHireAgreement;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TruckType extends Model implements AuditableContract
{
    use Auditable;
    
    protected $guarded = ['id'];

    public function loadingHireAgreement()
    {
        return $this->hasMany(LoadingHireAgreement::class,'truck_type_id');
    }

}
