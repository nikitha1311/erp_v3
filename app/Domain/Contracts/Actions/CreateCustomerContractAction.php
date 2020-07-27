<?php

namespace App\Domain\Contracts\Actions;


use App\Domain\Contracts\Models\Contract;

class CreateCustomerContractAction
{
    private $description;
    private $signed_at;
    private $valid_till;
    private $status;

    public function __construct($description, $signed_at, $valid_till,$status)
    {
        $this->description = $description;
        $this->signed_at = $signed_at;
        $this->valid_till = $valid_till;
        $this->status = $status;
    }

    public function handle($customer)
    {

        return Contract::create([
            'description' => $this->description,
            'signed_at' => $this->signed_at,
            'valid_till' => $this->valid_till,
            'status'=>$this->status,
            'customer_id' => $customer->id,
            'created_by' => 1
        ]);
    }
}
