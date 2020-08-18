<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;
use App\Domain\Branches\Models\Branch;
use App\Domain\Users\Models\User;

class UsersBranchFilter extends Filter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request):Builder
    {
        return $query->whereHas('branch',function($builder) use ($value) {
            $builder->where('name',$value);
        });
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): Array
    {
        return [
            'Chennai' => 'Chennai',
            'Haridwar' => 'Haridwar',
            'Sivakasi' => 'Sivakasi',
            'Pondicherry' => 'Pondicherry',
            'Jaipur' => 'Jaipur',
            'Shamli' => 'Shamli',
            'Mysuru' => 'Mysuru',
            'Guntur' => 'Guntur',
            'Bengaluru' => 'Bengaluru',
            'Hyderabad' => 'Hyderabad',
            'Munger' => 'Munger',
            'Sharanpur' => 'Sharanpur',
            'Hosur' => 'Hosur',
            'Salem' => 'Salem',
            'Noida' => 'Noida',
            'Kolkata' => 'Kolkata',
            'Jolarpet' => 'Jolarpet',
            'Coimbatore' => 'Coimbatore',
            'Disabled' => 0,
        ];
    }

    public $title =  "Branch";
}
