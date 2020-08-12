<?php

namespace App\Domain\Branches\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Branch extends Model implements AuditableContract
{
    use Auditable; 

    protected $guarded = ['id'];

}
