<?php

use Illuminate\Support\Facades\Config;
use Carbon\Carbon;


function branches()
{
    if (is_null(cache('branches'))) {
        cache()->forever('branches', App\Domain\Branches\Models\Branch::all());
    }
    return cache('branches');
//    return cache()->has('branches') ? cache('branches') : cache()->forever('branches', \App\Models\Branch::all());
}



