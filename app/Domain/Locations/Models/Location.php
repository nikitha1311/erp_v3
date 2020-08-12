<?php

namespace App\Domain\Locations\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Location extends Model implements AuditableContract
{
    use Auditable;
    
    protected $guarded=['id'];

    public function __toString()
    {
        return $this->formattedAddress();
    }

    public function formattedAddress()
    {
        return explode(",",$this->formatted_address)[0];
    }

}
