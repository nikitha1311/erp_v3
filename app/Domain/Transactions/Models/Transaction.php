<?php

namespace App\Domain\Transactions\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;
use App\Traits\HasApprovals;
use App\Domain\TruckType\Models\TruckType;
use App\Domain\Locations\Models\Location;
use App\Domain\Routes\Models\Route;
use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Domain\GCs\Models\GoodsConsignmentNote;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Transaction extends Model implements AuditableContract
{
    use SoftDeletes,HasApprovals,CreatedBy,Auditable;

    protected $guarded = ['id'];

    protected $dates = ['date','deleted_at'];

    public function id()
    {
        return "TRN#{$this->id}";
    }
    public function invoiceStatus()
    {
        return $this->invoice ?
            new HtmlString("<a target='_blank' href='" . url("invoices/{$this->invoice_id}") . "'>{$this->invoice->id()} - {$this->invoice->number}</a>") :
            'Not added to Invoice';
    }

    public function isEditable()
    {
        if (!$this->invoice)
            return true;
        elseif ($this->invoice->status() == 'Open for Modification')
            return true;
        return false;
    }


    public function route()
    {
        return $this->hasOne(Route::class, 'id', 'route_id')->withDefault([
            'route.from' => new Location(['formatted_address' => '-']),
            'route.to' => new Location(['formatted_address' => '-']),
            'route.truck_type' => new TruckType(['name' => '-']),
            'route.truckType' => new TruckType(['name' => '-']),
        ]);
    }
    public function addLHA(int $lhaID)
    {
        $oldVal['LHA Numbers'] = $this->loadingHireAgreements->pluck('number')->toArray();
        $this->loadingHireAgreements()->syncWithoutDetaching($lhaID);
        return $this;
    }

    public function makeDefaultLHA(int $lha_id)
    {
        if ($this->loadingHireAgreements()->where('id', $lha_id)->exists() || $lha_id == 0) {
            $updateValue = $lha_id;
            if ($this->lha_id == $lha_id)
                $updateValue = null;
            if ($lha_id == 0)
                $updateValue = null;
            return (bool)$this->update([
                'lha_id' => $updateValue,
            ]);
        }
        return false;
    }
    public function updateTotal()
    {
        $billing = optional($this->billingRate)->rate;
        $this->update([
            'total' => $billing + $this->manual_freight + $this->loading + $this->unloading + $this->handling + $this->detention + $this->others,
        ]);
        return $this;
    }

    public function defaultLHA()
    {
        return $this->hasOne(LoadingHireAgreement::class, 'id', 'lha_id');
    }

    public function loadingHireAgreements()
    {
        return $this->belongsToMany(LoadingHireAgreement::class, 'lhas_transactions',
            'transaction_id', 'lha_id')->withTimestamps();
    }

    public function goodsConsignmentNotes()
    {
        return $this->belongsToMany(GoodsConsignmentNote::class, 'gcs_transactions',
            'transaction_id', 'gc_id')->withTimestamps();
    }
    public function addGC(int $goodsConsignmentNote)
    {
        $oldVal['GC Numbers'] = $this->goodsConsignmentNotes->pluck('number')->toArray();
        $this->goodsConsignmentNotes()->syncWithoutDetaching($goodsConsignmentNote);
        return $this;
    }

}
