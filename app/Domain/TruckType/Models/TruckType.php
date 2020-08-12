<?php

namespace App\Domain\TruckType\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TruckType extends Model implements AuditableContract
{
    use Auditable;
    
    protected $guarded = ['id'];

}
