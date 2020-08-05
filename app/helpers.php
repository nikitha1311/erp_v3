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

function consignors()
{
    if (is_null(cache('consignors'))) {
        cache()->forever('consignors', \App\Domain\Customers\Models\Customer::where('is_consignor', 1)->get());
    }
    return cache('consignors');
}

function consignees()
{
    if (is_null(cache('consignees'))) {
        cache()->forever('consignees', \App\Domain\Customers\Models\Customer::where('is_consignee', 1)->get());
    }
    return cache('consignees');
}

function billedOn()
{
    if (is_null(cache('billedOn'))) {
        cache()->forever('billedOn', \App\Domain\Customers\Models\Customer::where('is_billed_on', 1)->get());
    }
    return cache('billedOn');
}
function numberToCurrency($number)
{
    return preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $number);
}

function getBaseMileage($group, $weight)
{
    switch($group)
    {
        case 'JSM2518' : return $weight >= 15 ? 4 : 4.5;
        case 'JSMTN' : return $weight >= 10 ? 5.5 : 6;
        case 'JSM4923' : return $weight >= 38 ? 2 : 2.25;
        default : return 0;
    }
}

function getEnroutePerKm($group)
{
    switch($group)
    {
        case 'JSM2518' : return 2;
        case 'JSMTN' : return 1;
        case 'JSM4923' : return 4;
        default : return 0;
    }
}
