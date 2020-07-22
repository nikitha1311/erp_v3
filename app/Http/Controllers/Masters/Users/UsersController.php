<?php

namespace App\Http\Controllers\Masters\Users;

use App\Domain\Masters\Users\Models\User;
use App\Domain\Masters\Users\Requests\CreateUserRequest;
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
        return view('masters.users.create');

    }
    public function store(CreateUserRequest $request)
    {
         User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->phone),
//            'branch_id' => $request->branch_id,
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
        return view('masters.users.edit')->with(['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
//        User::update([
//            'name' => $request->name,
//            'phone' => $request->phone,
//            'email' => $request->email,
////            'password' => bcrypt($request->phone),
//            'branch_id' => $request->branch_id,
//        ]);

        $user=array(
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
//            'password' => bcrypt($request->phone),
//            'branch_id' => $request->branch_id,
        );
        $user=User::find($id)->update($user);
        return redirect('users');
    }
}
