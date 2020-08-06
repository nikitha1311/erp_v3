<?php

namespace App\Domain\TruckExpenses\Models;

use App\Traits\HasApprovals;
use App\User;
use Illuminate\Database\Eloquent\Model;

class TruckExpense extends Model
{
    use HasApprovals;

    protected $guarded=['id'];

    protected $dates = ['expense_date','valid_till','approved_date'];

    public function approvedBy()
    {
        return $this->belongsTo(User::class,'id','approved_by');
    }
}
