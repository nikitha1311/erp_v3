<?php

namespace App\Domain\LHAs\Models;

use App\Domain\Vendors\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Traits\HasApprovals;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use App\Domain\Locations\Models\Location;
use App\Domain\TruckType\Models\TruckType;
use App\Domain\Branches\Models\Branch;
use App\Domain\Transactions\Models\Transaction;

class LoadingHireAgreement extends Model
{
    use SoftDeletes,HasApprovals;

    protected $guarded = ['id'];


    protected $dates = [
        'date','deleted_at','loading_reported','loading_released','unloading_reported','unloading_released','expected_delivery_date'
    ];

    public function id()
    {
        return "LH#".$this->id;
    }

    public function url()
    {
        return '/loading-hire-agreements/'.$this->id;
    }

    public function type()
    {
        return $this->type == 0 ? 'Local' : 'Full Trip';
    }

    public function isLocal()
    {
        return $this->type == 0;
    }

    public function isFullTrip()
    {
        return !$this->isLocal();
    }

    public function from()
    {
        return $this->belongsTo(Location::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(Location::class,'to_id');
    }

    public function truckType()
    {
        return $this->belongsTo(TruckType::class,'truck_type_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }

    public function calculateDetention()
    {
        if (!is_null($this->loading_released) && !is_null($this->loading_reported)) {
            $this->update([
                'loading_detention' => $this->loading_released->diffInHours($this->loading_reported),
            ]);
        }
        if (!is_null($this->unloading_released) && !is_null($this->unloading_reported)) {
            $this->update([
                'unloading_detention' => $this->unloading_released->diffInHours($this->unloading_reported),
            ]);
        }
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class,'lhas_transactions','lha_id','transaction_id');
    }
}
