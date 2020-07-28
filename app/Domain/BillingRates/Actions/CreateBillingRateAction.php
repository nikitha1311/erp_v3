<?php

namespace App\Domain\BillingRates\Actions;


use App\Domain\BillingRates\Models\BillingRate;
use Carbon\Carbon;

class CreateBillingRateAction
{
    private $description;
    private $rate;
    private $wef;
    private $route_id;

    public function __construct($rate, $description, $wef, $route_id)
    {
        $this->description = $description;
        $this->rate = $rate;
        $this->wef = $wef;
        $this->route_id = $route_id;
    }

    public function handle()
    {
        return BillingRate::create([
            'rate' => $this->rate,
            'description' => $this->description,
            'wef' => Carbon::createFromFormat('d-m-Y',$this->wef),
            'route_id' => $this->route_id,
            'created_by' => auth()->user()->id
        ]);
    }
}
