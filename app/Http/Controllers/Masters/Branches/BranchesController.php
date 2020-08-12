<?php

namespace App\Http\Controllers\Masters\Branches;
use App\Classes\Notification;

use App\Domain\Branches\Actions\UpdateBranchesAction;
use App\Domain\Branches\Models\Branch;
use App\Domain\Branches\Requests\CreateBranchRequest;
use App\Domain\Branches\Requests\UpdateBranchRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Branches\Actions\CreateBranchesAction;


class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $branch=Branch::all();
        return view('masters.branches.index')->with([
            'branches'=>$branch,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $branches=new Branch();
        return view('masters.branches.create')->with(['branch'=>$branches]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBranchRequest $request)
    {
        $createBranchesAction = new CreateBranchesAction($request->name,$request->address);
        $branch = $createBranchesAction->handle();
        Notification::success('Branch Created successfully!');
        return redirect('/branches');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        $audits = $branch->audits;
        return view('masters.branches.show')
            ->with([
                'branch' => $branch,
                'audits' => $audits
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('masters.branches.edit')->with(['branch'=>$branch]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $UpdateBranchesAction = new UpdateBranchesAction($request->name,$request->address);
        $branch = $UpdateBranchesAction->handle($branch);
        Notification::success('Branch updated successfully!');
        return redirect("/branches/{$branch->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        if ($branch) {
            $branch->delete();
        }
        Notification::success('Branch Deleted successfully!');
        return redirect()->back();
    }
}
