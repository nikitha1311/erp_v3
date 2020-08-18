<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;
use App\Domain\Vendors\Models\Vendor;

class LoadingHireAgreementVendorFilter extends Filter
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
        return $query->whereHas('vendor',function($vendor) use ($value) {
            $vendor->where('id',$value);
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
        $vendor = Vendor::query()->whereHas('loadingHireAgreement')->get();
        $plucked = $vendor->pluck('id','name');
        return $plucked->toArray();      
    }

    public $title =  "LHA Vendor";
}
