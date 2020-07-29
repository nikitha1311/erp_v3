<?php

namespace App\Domain\GCs\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Domain\Customers\Models\Customer;
use App\Domain\Branches\Models\Branch;

class GoodsConsignmentNote extends Model
{
    protected $guarded = ['id'];

    protected $table = 'goods_consignment_notes';

    public function transaction()
    {
        return $this->belongsToMany(Transaction::class, 'gcs_transactions',
             'gc_id','transaction_id')->withTimestamps();
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
