<?php

namespace App\Repositories;

use App\Contact\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function all()
    {
        return User::get();
    }
    public function get($id)
    {
        return User::find($id);
    }
    public function store(array $data)
    {
        return User::create($data);
    }
    public function update($id, array $data)
    {
        return User::find($id)->update($data);
    }
    public function delete($id)
    {
        return User::destroy($id);
    }
}
