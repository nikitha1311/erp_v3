<?php

namespace App\Domain\TruckExpenses\Models;

use App\Traits\HasApprovals;
use App\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TruckExpense extends Model implements AuditableContract
{
    use HasApprovals,Auditable;

    protected $guarded=['id'];

    protected $dates = ['expense_date','valid_till','approved_date'];

    public function approvedBy()
    {
        return $this->belongsTo(User::class,'id','approved_by');
    }
}
