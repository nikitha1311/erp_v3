<?php

namespace App\Domain\BillingRates\Actions;
use Carbon\Carbon;

use App\Domain\BillingRates\Models\BillingRate;

class UpdateBillingRateAction
{
    private $description;
    private $rate;
    private $wef;
    private $route_id;
    /**
     * @var BillingRate
     */
    private $billingRate;

    public function __construct($rate, $description, $wef, $route_id, BillingRate $billingRate)
    {
        $this->description = $description;
        $this->rate = $rate;
        $this->wef = $wef;
        $this->route_id = $route_id;
        $this->billingRate = $billingRate;
    }

    public function handle()
    {
         $this->billingRate->update([
            'rate' => $this->rate,
            'description' => $this->description,
            'wef' => Carbon::createFromFormat('d-m-Y',$this->wef),
            'route_id' => $this->route_id,
            'created_by' => auth()->user()->id
        ]);
        return $this->billingRate;
    }
}
