<?php

namespace App\Domain\TruckLedgers\Models;

use App\Domain\Trips\Models\Trip;
use App\Domain\Truck\Models\Truck;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;
use App\Traits\HasApprovals;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class TruckLedger extends Model implements AuditableContract
{
    use CreatedBy, HasApprovals,Auditable;

    protected $dates = [
        'when'
    ];

    protected $guarded=['id'];

    public function id()
    {
        return "LED#".$this->id;
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class,'ledgerable_id','id');
    }

    public function ledgers()
    {
        $this->morphTo();
    }

}
