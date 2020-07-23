<?php

namespace App\Domain\Customers\Actions;


use App\Domain\Customers\Models\Customer;

class CreateCustomerAction
{
    private $name;
    private $code;
    private $address;

    public function __construct($name, $code, $address)
    {
        $this->name = $name;
        $this->code = $code;
        $this->address = $address;
    }

    public function handle()
    {
        return Customer::create([
            'name' => $this->name,
            'code' => $this->code,
            'address' => $this->address,
        ]);
    }
}
