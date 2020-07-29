<?php

namespace App\Domain\Transactions\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;
use App\Traits\HasApprovals;
use App\Domain\TruckType\Models\TruckType;
use App\Domain\Locations\Models\Location;
use App\Domain\Routes\Models\Route;
use App\Domain\LHAs\Models\LHA;
use App\Domain\GCs\Models\GC;
class Transaction extends Model
{
    use HasApprovals,CreatedBy;

    protected $guarded = ['id'];

    protected $dates = ['date','deleted_at'];

    public function route()
    {
        return $this->hasOne(Route::class, 'id', 'route_id')->withDefault([
            'route.from' => new Location(['formatted_address' => '-']),
            'route.to' => new Location(['formatted_address' => '-']),
            'route.truck_type' => new TruckType(['name' => '-']),
            'route.truckType' => new TruckType(['name' => '-']),
        ]);
    }

    public function loadingHireAgreements()
    {
        return $this->belongsToMany(LHA::class, 'lhas_transactions',
            'transaction_id', 'lha_id')->withTimestamps();
    }

    public function goodsConsignmentNotes()
    {
        return $this->belongsToMany(GC::class, 'gcs_transactions',
            'transaction_id', 'gc_id')->withTimestamps();
    }
}
