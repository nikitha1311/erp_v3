<?php

namespace App\Domain\BillingRates\Actions;


use App\Domain\BillingRates\Models\BillingRate;
use Carbon\Carbon;

class CreateBillingRateAction
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

    public function handle($route)
    {

        return BillingRate::create([
            'rate' => $this->rate,
            'description' => $this->description,
            'wef' => Carbon::createFromFormat('d-m-Y',$this->wef),
            'route_id' => $route->id,
            'created_by' => 1
        ]);
    }
}
