<?php

namespace App\Domain\Customers\Models;


use App\Domain\Transactions\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Contracts\Models\Contract;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['name','code','address','is_consignor','is_consignee','is_billed_on'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function liveContracts()
    {
        return $this->contracts()->where('status',1);
    }
}
