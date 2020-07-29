<?php

namespace App\Domain\Vendors\Actions;


use App\Domain\Vendors\Models\Vendor;

class UpdateVendorAction
{
    private $name;
    private $phone;
    private $address;
    private $company_name;
    private $remarks;
    private $created_by;

    public function __construct($name, $phone,$address,$company_name, $remarks,$created_by)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->company_name = $company_name;
        $this->remarks = $remarks;
        $this->created_by = $created_by;

    }

    public function handle($vendor)
    {
         $vendor->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'company_name' => $this->company_name,
            'remarks' => $this->remarks,
            'created_by' => auth()->user()->id,
        ]);
        return $vendor;
    }
}
