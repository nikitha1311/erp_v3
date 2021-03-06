<?php

namespace App\Domain\GCs\Models;

use App\Domain\Transactions\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Domain\Customers\Models\Customer;
use App\Domain\Branches\Models\Branch;
use App\Traits\HasApprovals;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;




class GoodsConsignmentNote extends Model implements AuditableContract
{
    use SoftDeletes,HasApprovals,Auditable;

    protected $guarded = ['id'];

    protected $dates=['date','deleted_at','ack_received_date'];

    protected $table = 'goods_consignment_notes';

    public function transaction()
    {
        return $this->belongsToMany(Transaction::class, 'gcs_transactions',
             'gc_id','transaction_id')->withTimestamps();
    }

    public function ackStatus()
    {
       return $this->ack_status == 0 ? 'Not Received' : $this->ack_received_date->format('d-m-Y')." - ".$this->ack_received_remarks ;

    }


    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function consignor()
    {
        return $this->belongsTo(Customer::class, 'consignor_id', 'id');
    }

    public function consignee()
    {
        return $this->belongsTo(Customer::class, 'consignee_id', 'id');
    }

    public function billedOn()
    {
        return $this->belongsTo(Customer::class, 'bill_on_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }
}
