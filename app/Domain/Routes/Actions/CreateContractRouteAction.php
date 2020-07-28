<?php

namespace App\Domain\Routes\Actions;

use App\Domain\Routes\Models\Route;

class CreateContractRouteAction
{
    /**
     * @var array
     */
    private $params;
    private $contract_id;


    public function __construct($contract_id, array $params)
    {
        $this->params = $params;
        $this->contract_id = $contract_id;
    }

    public function handle()
    {
        $fields = [
            'contract_id' => $this->contract_id,
            'created_by' => 1
        ];
        $params = array_merge($fields, $this->params);
        return Route::create($params);
    }
}
