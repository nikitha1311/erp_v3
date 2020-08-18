<?php

namespace App\Filters;

use App\Domain\Customers\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class LoadingHireAgreementsCustomerFilter extends Filter
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
        return $query->whereHas('transactions',function($transaction) use ($value) {
            $transaction->whereHas('customer',function($customer) use ($value){
                $customer->where('id',$value);
            });
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
        $customer = Customer::query()->whereHas('transactions',function($transaction){
            $transaction->whereHas('loadingHireAgreements');
        })->get();
        $plucked = $customer->pluck('id','name');
        return $plucked->toArray();
    }

    public $title =  "LHA Customer";
}
