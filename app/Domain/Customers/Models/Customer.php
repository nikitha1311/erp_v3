<?php

namespace App\Domain\Customers\Models;


use Illuminate\Database\Eloquent\Model;
use App\Domain\Contracts\Models\Contract;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['name','code','address','is_consignor','is_consignee','is_billed_on'];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
