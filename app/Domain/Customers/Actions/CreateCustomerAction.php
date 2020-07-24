<?php

namespace App\Domain\Customers\Actions;


use App\Domain\Customers\Models\Customer;

class CreateCustomerAction
{
    private $name;
    private $code;
    private $address;
    private $is_consignor;
    private $is_consignee;
    private $is_billed_on;

    public function __construct($name, $code, $address,$is_consignor,$is_consignee,$is_billed_on)
    {
        $this->name = $name;
        $this->code = $code;
        $this->address = $address;
        $this->is_consignor = $is_consignor;
        $this->is_consignee = $is_consignee;
        $this->is_billed_on = $is_billed_on;
    }

    public function handle()
    {
        // if($this->is_consignor || $this->is_consignee || $this->is_billed_on){

        // }
        return Customer::create([
            'name' => $this->name,
            'code' => $this->code,
            'address' => $this->address,
            'is_consignor'=>$this->is_consignor == 'on' ? 1  : 0,
            'is_consignee'=>$this->is_consignee == 'on' ? 1  : 0,
            'is_billed_on'=>$this->is_billed_on == 'on' ? 1  : 0,
        ]);
    }
}
