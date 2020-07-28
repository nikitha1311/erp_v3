<?php

namespace App\Http\Controllers\Masters\Vendors;
use App\Classes\Notification;

use App\Domain\Orders\Models\Order;
use App\Domain\Vendors\Actions\CreateVendorAction;
use App\Domain\Vendors\Actions\UpdateVendorAction;
use App\Domain\Vendors\Models\Vendor;
use App\Domain\Vendors\Requests\CreateVendorRequest;
use App\Domain\Vendors\Requests\UpdateVendorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor=Vendor::all();
        return view('masters.vendors.index')->with([
            'vendors'=>$vendor->load('createdBy')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor = new Vendor();
        return view('masters.vendors.create')
            ->with([
                'vendors' => $vendor,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVendorRequest $request)
    {

        $createVendorAction = new CreateVendorAction($request->name, $request->phone, $request->address, $request->company_name,$request->remarks,$request->created_by);
        $vendor = $createVendorAction->handle();
        Notification::success('Vendor created successfully!');
        return redirect('/vendors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {

        return view('masters.vendors.show')
            ->with([
                'vendors' => $vendor,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('masters.vendors.edit')
            ->with([
                'vendors' => $vendor,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorRequest $request,Vendor $vendor)
    {

        $updateVendorAction = new UpdateVendorAction($request->name, $request->phone, $request->address, $request->company_name,$request->remarks,$request->created_by);
        $vendor = $updateVendorAction->handle($vendor);
        Notification::success('Vendor Updated successfully!');
        return redirect("vendors/{$vendor->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        if ($vendor) {
            $vendor->delete();
        }
        Notification::success('Vendor Deleted successfully!');
        return redirect()->back();
    }
}
