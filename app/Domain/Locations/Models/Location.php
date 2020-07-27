<?php

namespace App\Domain\Locations\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded=['id'];

    public function __toString()
    {
        return $this->formattedAddress();
    }

    public function formattedAddress()
    {
        return explode(",",$this->formatted_address)[0];
    }

}
