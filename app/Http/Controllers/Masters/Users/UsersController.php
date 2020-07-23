<?php

namespace App\Http\Controllers\Masters\Users;

use App\Classes\Notification;
use App\Domain\Branches\Models\Branch;
use App\Domain\Customers\Requests\UpdateCustomerRequest;
use App\Domain\Users\Actions\CreateUserAction;
use App\Domain\Users\Models\User;
use App\Domain\Users\Requests\CreateUserRequest;
use App\Domain\Users\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('masters.users.index')
            ->with([
                'users' => $user
            ]);
    }

    public function create()
    {
        $branches = Branch::all();
        $user = new User();
        return view('masters.users.create')
            ->with([
                'branches' => $branches,
                'user' => $user
            ]);
    }

    public function store(CreateUserRequest $request)
    {
        $createUserAction = new CreateUserAction($request->name, $request->email, $request->phone, $request->branch_id);
        $user = $createUserAction->handle();
        Notification::success('User created successfully!');
        return redirect('/users');
    }

    public function show(User $user)
    {
        $branches = Branch::all();
        return view('masters.users.show')
            ->with([
                'user' => $user,
                'branches' => $branches
            ]);
    }

    public function edit(User $user)
    {
        $branches = Branch::all();
        return view('masters.users.edit')
            ->with([
                'user' => $user,
                'branches' => $branches
            ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'branch_id' => $request->branch_id,
        ]);
        Notification::success('User updated successfully!');
        return redirect('users');
    }
}
