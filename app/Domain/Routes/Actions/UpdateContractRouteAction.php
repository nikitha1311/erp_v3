<?php

namespace App\Domain\Routes\Actions;


use App\Domain\Routes\Models\Route;

class UpdateContractRouteAction
{
    private $params;
    private $contract_id;
    private $route_id;

    public function __construct( $contract_id,$route_id,array $params)
    {
        $this->params = $params;
        $this->contract_id = $contract_id;
        $this->route_id = $route_id;
    }

    public function handle()
    {
        // dd();
        $fields = [
            'contract_id' => $this->contract_id,
            'created_by' => auth()->user()->id
        ];
        $params = array_merge($fields, $this->params);
        return $this->route_id->update($params);
    }
}
