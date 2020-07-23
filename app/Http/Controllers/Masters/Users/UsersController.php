<?php

namespace App\Http\Controllers\Masters\Users;

use App\Domain\Branches\Models\Branch;
use App\Domain\Masters\Customers\Requests\UpdateCustomerRequest;
use App\Domain\Masters\Users\Models\User;
use App\Domain\Masters\Users\Requests\CreateUserRequest;
use App\Domain\Masters\Users\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $user=User::all();

        return view('masters.users.index')->with(['users'=>$user]);
    }
    public function create()
    {
        $branches=Branch::all();
//        dd($branches);
        return view('masters.users.create')->with(['branch'=>$branches]);

    }
    public function store(CreateUserRequest $request)
    {
         User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->phone),
            'branch_id' => $request->branch_id,
        ]);
//        if($request->role)
//            $user->assignRole($request->role);
        return redirect('/users');

    }
    public function show($id)
    {
        $user = User::find($id);
        return view('masters.users.show')->with(['user' => $user]);
    }
    public function edit($id)
    {
        $user=User::find($id);
        $branches=Branch::all();
        return view('masters.users.edit')->with(['user'=>$user,'branch'=>$branches]);
    }

    public function update(UpdateUserRequest $request,User $user)
    {
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
//            'password' => bcrypt($request->phone),
            'branch_id' => $request->branch_id,
        ]);

               return redirect('users');
    }
}
