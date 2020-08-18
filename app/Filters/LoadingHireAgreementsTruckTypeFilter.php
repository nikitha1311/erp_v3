<?php

namespace App\Filters;

use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Domain\TruckType\Models\TruckType;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class LoadingHireAgreementsTruckTypeFilter extends Filter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas('truckType',function($trucktype) use ($value) {
            $trucktype->where('id',$value);
        });
        // return $query->where('', $value);
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): Array
    {
        $truckType = TruckType::query()->whereHas('loadingHireAgreement')->get();
        $plucked = $truckType->pluck('id','name');
        return $plucked->toArray(); 
    }

    public $title =  "LHA TruckType";
}
