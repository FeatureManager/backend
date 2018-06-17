<?php
namespace App\Repositories;

use App\Repositories\Contracts\User as Contract;
use App\User;

class UserRepository implements Contract
{
    public function getAllUsers()
    {
        return User::all();
    }
 
    public function getUserById($uuid)
    {
        return User::where('uuid', $uuid)->firstOrFail();
    }

    public function createOrUpdate($data)
    {
        if (array_has($data, 'uuid')) {
            $user = User::where('uuid', $data['uuid'])->firstOrFail();
            $user->email = $data['email'];
            return $user->save();
        }

        return User::create($data);
    }
}
