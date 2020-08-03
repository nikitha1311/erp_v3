<?php

namespace App\Domain;

use App\BaseModel;
use App\User;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Approval extends BaseModel implements AuditableContract
{
    use Auditable;

    public function approvals()
    {
        return $this->morphTo();
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class,'approved_by','id');
    }
}
