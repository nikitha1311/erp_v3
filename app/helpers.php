<?php

use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

function formatDMY($date)
{
    return \Carbon\Carbon::createFromFormat('d-m-Y', $date);
}

function branches()
{
    if (is_null(cache('branches'))) {
        cache()->forever('branches', App\Domain\Branches\Models\Branch::all());
    }
    return cache('branches');
//    return cache()->has('branches') ? cache('branches') : cache()->forever('branches', \App\Models\Branch::all());
}

function locations()
{
    return \App\Domain\Locations\Models\Location::all();
}

function truckTypes()
{
    return \App\Domain\TruckType\Models\TruckType::all();
}



