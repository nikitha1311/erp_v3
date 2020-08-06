<?php

namespace App\Http\Controllers;

// use App\Invoices\PaymentAdvice;
use App\Domain\Customers\Models\Customer;
use App\Domain\Routes\Models\Route;
use App\Domain\GCs\Models\GoodsConsignmentNote;
use App\Domain\LHAs\Models\LoadingHireAgreement;
use App\Domain\Vendors\Models\Vendor;
// use App\Models\Vendors\VendorBankAccount;
use Illuminate\Http\Request;

class Select2Controller extends Controller
{
    public function customers()
    {
        return Customer::where('is_billed_on', '1')->where('name', 'LIKE', '%' . request('q') . '%')->orWhere('code', 'LIKE', '%' . request('q') . '%')->get();
    }

    public function vendors()
    {
        return Vendor::where('name', 'LIKE', '%' . request('q') . '%')->get();
    }

    // public function vendorBankAccounts($vendor)
    // {
    //     return VendorBankAccount::where('vendor_id', $vendor)->get();
    // }

    // public function bankAccounts()
    // {
    //     $query = request('q');
    //     return VendorBankAccount::where('beneficiary_name', 'LIKE', '%' . $query . '%')
    //         ->orWhere('beneficiary_phone', 'LIKE', '%' . $query . '%')
    //         ->orWhere('account_number', 'LIKE', '%' . $query . '%')
    //         ->get();
    // }

    public function loadingHireAgreements()
    {
        return LoadingHireAgreement::where('number', 'LIKE', '%' . request('q') . '%')->get();
    }

    public function goodsConsignmentNotes()
    {
        return GoodsConsignmentNote::where('number', 'LIKE', '%' . request('q') . '%')->get();
    }

    public function routes()
    {
        $customer_id = request('customer_id');
        if (!$customer_id)
            return;
        $customer = Customer::findOrFail($customer_id);
        $liveContracts = $customer->liveContracts->pluck('id')->toArray();
        return Route::with('from', 'to', 'truckType', 'contract.customer')
            ->whereIn('contract_id', $liveContracts)
            ->get();
    }

    public function lhasForTransactions()
    {
        return LoadingHireAgreement::with('truckType')->where('number', 'like', '%' . request('q') . '%')
            ->orWhere('truck_number', 'like', '%' . request('q') . '%')->get();
    }

    public function gcsForTransactions()
    {
        return GoodsConsignmentNote::where('number', 'like', '%' . request('q') . '%')->get();
    }

    public function transactionsForCustomer(Customer $customer)
    {
        return
            $customer
                ->transactions()
                ->with('route.from', 'route.to', 'route.truckType', 'defaultLHA', 'goodsConsignmentNotes')
                ->whereHas('defaultLHA')
                ->whereHas('route.from', function ($q) {
                    $q->where('locality', 'LIKE', '%' . request('q') . '%');
                })
                ->orWhereHas('route.to', function ($q) {
                    $q->where('locality', 'LIKE', '%' . request('q') . '%');
                })
                ->orWhereHas('defaultLHA', function ($q) {
                    $q->where('number', 'LIKE', '%' . request('q') . '%')
                        ->orWhere('truck_number', 'LIKE', '%' . request('q') . '%');
                })
                ->orWhereHas('goodsConsignmentNotes', function ($q) {
                    $q->where('number', 'LIKE', '%' . request('q') . '%');
                })
                ->get();
    }

    // public function paymentAdvicesForInvoices()
    // {
    //     $array = explode('PA#', strtoupper(request('q')));
    //     return PaymentAdvice::where('id', array_last($array))->get();
    // }
}
