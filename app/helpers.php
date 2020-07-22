<?php

use Illuminate\Support\Facades\Config;
use Carbon\Carbon;


function formatDMY($date)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date);
}

function consignors()
{
    if (is_null(cache('consignors'))) {
        cache()->forever('consignors', \App\Models\Customer::where('is_consignor', 1)->get());
    }
    return cache('consignors');
}

function consignees()
{
    if (is_null(cache('consignees'))) {
        cache()->forever('consignees', \App\Models\Customer::where('is_consignee', 1)->get());
    }
    return cache('consignees');
}

function billedOn()
{
    if (is_null(cache('billedOn'))) {
        cache()->forever('billedOn', \App\Models\Customer::where('is_billed_on', 1)->get());
    }
    return cache('billedOn');
}

function branches()
{
    if (is_null(cache('branches'))) {
        cache()->forever('branches', App\Domain\Branches\Models\Branch::all());
    }
    return cache('branches');
//    return cache()->has('branches') ? cache('branches') : cache()->forever('branches', \App\Models\Branch::all());
}

function users()
{
    if (is_null(cache('users'))) {
        cache()->forever('users', \App\User::all());
    }
    return cache('users');
}

function locations()
{
    if (is_null(cache('locations'))) {
        cache()->forever('locations', \App\Models\Location::all());
    }
    return cache('locations');
}

function truckTypes()
{
    if (is_null(cache('truckTypes'))) {
        cache()->forever('truckTypes', \App\Models\TruckType::all());
    }
    return cache('truckTypes');
}

function notesTypes()
{
    if (is_null(cache('notesTypes'))) {
        cache()->forever('notesTypes', Config::get('constants.notesTypes'));
    }
    return cache('notesTypes');
}

function roles()
{
    if (is_null(cache('roles'))) {
        cache()->forever('roles', \Spatie\Permission\Models\Role::all());
    }
    return cache('roles');
}

function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
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
function expenseType(){
    return [
        'Challan',
        'Food',
        'Case',
        'Unplanned Maintainance',
    ];
}


