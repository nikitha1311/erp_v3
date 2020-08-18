<?php

namespace App\Domain\Invoices\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;


class InvoiceStatus extends Model
{
    use CreatedBy;

    protected $guarded= ['id'];

    protected $dates = ['date'];

    public function __toString()
    {
        switch($this->status)
        {
            case 0 : return "Open for Modification";
            case 1 : return $this->remarks;
            case 2 : return "Cleared";
        }
    }
}
