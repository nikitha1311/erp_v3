<?php

namespace App\Traits;

use App\Domain\Users\Models\User;

trait CreatedBy
{
    public function CreatedBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
