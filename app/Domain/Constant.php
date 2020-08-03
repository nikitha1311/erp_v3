<?php

namespace App\Domain;


use App\BaseModel;
use App\Domain\LHAs\Models\LoadingHireAgreement;

class Constant extends BaseModel
{

    public static function LHANumber()
    {

        $constant = static::whereModel(LoadingHireAgreement::class)->latest()->first();
//        dd($constant);
        if(!$constant)
            throw new \Exception("Constants not found");
        $constant->increment('number');
        $constant = $constant->fresh();
        return $constant->prefix.$constant->number;
    }

}
