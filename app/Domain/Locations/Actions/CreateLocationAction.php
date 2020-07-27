<?php

namespace App\Domain\Locations\Actions;


use App\Domain\Locations\Models\Location;

class CreateLocationAction
{
    private $formatted_address;
    private $locality;
    private $district;
    private $state;
    private $postal_code;

    public function __construct($formatted_address, $locality,$district,$state, $postal_code)
    {
        $this->formatted_address = $formatted_address;
        $this->locality = $locality;
        $this->district = $district;
        $this->state = $state;
        $this->postal_code = $postal_code;

    }

    public function handle()
    {
        return Location::create([
            'formatted_address' => $this->formatted_address,
            'locality' => $this->locality ?? '-',
            'district' => $this->district ?? '-',
            'state' => $this->state,
            'postal_code' => $this->postal_code ?? '-',

        ]);
    }
}
