<?php

namespace App\Domain\Users\Models;

use App\Domain\Branches\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Model implements AuditableContract
{
    use Auditable;
    
    use Notifiable, HasRoles;

    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
