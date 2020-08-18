<?php

namespace App\Http\Livewire;

use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Filters\LoadingHireAgreementDateFilter;
use App\Filters\LoadingHireAgreementDateFromFilter;
use App\Filters\LoadingHireAgreementsCustomerFilter;
use App\Filters\LoadingHireAgreementStatusFilter;
use App\Filters\LoadingHireAgreementsTruckTypeFilter;
use App\Filters\LoadingHireAgreementTypeFilter;
use App\Filters\LoadingHireAgreementVendorFilter;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;

class LoadingHireAgreementView extends TableView
{
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository():Builder
    {
        return LoadingHireAgreement::query()->with('branch','from','to','truckType','transactions');
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'Number',
            'Branch',
            'Date',
            'Truck Number',
            'Type',
            'Status',
            'From',
            'To',
            'Truck Type',
            'Vendor',
            'Customer'
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        // dd(implode(" ",$model->transactions->map(function($transaction){
        //     return $transaction->customer->name;
        // })->toArray()));
        return [
            $model->number,
            $model->branch->name,
            $model->date->format('d-m-Y'),
            $model->truck_number,
            $model->type,
            $model->status,
            $model->from,
            $model->to,
            $model->truckType->name,
            $model->vendor->name,
            implode(" ",$model->transactions->map(function($transaction){
                return $transaction->customer->name;
            })->toArray()),
        ];
    }

    public $searchBy = ['number'];

    protected $paginate = 10;

    protected function filters()
    {
        return [
            new LoadingHireAgreementTypeFilter,
            new LoadingHireAgreementStatusFilter,
            new LoadingHireAgreementDateFromFilter,
            new LoadingHireAgreementVendorFilter,
            new LoadingHireAgreementsTruckTypeFilter,
            new LoadingHireAgreementsCustomerFilter
        ];
    }

}
