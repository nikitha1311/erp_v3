<?php

namespace App\Traits;

use App\Domain\Users\Models\User;

trait CreatedBy
{
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}