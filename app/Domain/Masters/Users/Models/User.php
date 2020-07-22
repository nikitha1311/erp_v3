<?php

namespace App\Domain\Masters\Users\Models;

use App\Domain\Branches\Models\Branch;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = ['id'];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }
}
