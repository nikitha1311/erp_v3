<?php

namespace App\Domain\Users\Actions;


use App\Domain\Users\Models\User;

class CreateUserAction
{
    private $name;
    private $email;
    private $phone;
    private $branchID;

    public function __construct($name, $email, $phone, $branchID)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->branchID = $branchID;
    }

    public function handle()
    {
        return User::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => bcrypt($this->phone),
            'branch_id' => $this->branchID,
        ]);
    }
}
