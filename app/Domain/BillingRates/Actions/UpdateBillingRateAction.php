<?php

namespace App\Domain\BillingRates\Actions;
use Carbon\Carbon;

use App\Domain\BillingRates\Models\BillingRate;

class UpdateBillingRateAction
{
    private $description;
    private $rate;
    private $wef;

    public function __construct($rate, $description, $wef)
    {
        $this->description = $description;
        $this->rate = $rate;
        $this->wef = $wef;
    }

    public function handle($route,$billingrate)
    {
         $billingrate->update([
            'rate' => $this->rate,
            'description' => $this->description,
            'wef' => Carbon::createFromFormat('d-m-Y',$this->wef),
            'route_id' => $route->id,
            'created_by' => 1
        ]);
        return $billingrate;
    }
}
