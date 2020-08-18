<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\BooleanFilter;

class LoadingHireAgreementTypeFilter extends BooleanFilter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param Array $value Associative array with the boolean value for each of the options
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value): Builder
    {
        
        // $value['0'] = true/false
        if ($value['0']) {
            $query->where('type', false);
        }
        // $value['1'] = true/false
        if ($value['1']) {
            $query->where('type', true);
        }
        return $query;
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): Array
    {
        return [
            "Local" => 0,
            "Full Trip" => 1
        ];
    }

    public $title =  "LHA Type";
}
