<?php

namespace App\Domain\Contracts\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Customers\Models\Customer;
use App\Traits\CreatedBy;
use App\Domain\Routes\Models\Route;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Contract extends Model implements AuditableContract
{
    use CreatedBy,Auditable;

    protected $table = 'contracts';

    protected $fillable = ['customer_id', 'description', 'signed_at', 'valid_till', 'status', 'created_by'];

    protected $dates = ['signed_at','valid_till'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function routes()
    {
        return $this->hasMany(Route::class);
    }

//    public static function getStatusAttribute($num)
//    {
//        switch ($num) {
//            case '0' :
//                return 'Invalid';
//            case '1' :
//                return 'Valid';
//        }
//    }
}
