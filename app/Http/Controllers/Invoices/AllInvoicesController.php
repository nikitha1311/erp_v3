<?php

namespace App\Http\Controllers\Invoices;

use App\Domain\Customers\Models\Customer;
use App\Domain\Invoices\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllInvoicesController extends Controller
{
    public function index(){

//        dd('1');
        $invoice=Invoice::all();
//        $customer=Customer::all();
//        $invoice = Invoice::with('customer','statuses');

        return view("invoices.allInvoices.index")->with([
            'invoices'=>$invoice->load('customer'),
//            'customer' =>$customer
        ]);

    }


}
