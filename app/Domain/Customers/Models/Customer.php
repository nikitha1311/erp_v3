<?php

namespace App\Domain\Customers\Models;


use Illuminate\Database\Eloquent\Model;
use App\Domain\Contracts\Models\Contract;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Customer extends Model implements AuditableContract
{
    use Auditable;
    
    protected $table = 'customers';

    protected $fillable = ['name','code','address','is_consignor','is_consignee','is_billed_on'];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
