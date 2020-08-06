<?php

namespace App\Traits;

use App\Domain\TruckLedgers\Models\TruckLedger;

trait HasTruckLedgers
{
    public function ledgers()
    {
        return $this->morphMany(TruckLedger::class, 'ledgerable');
    }
}