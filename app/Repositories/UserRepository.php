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

    public function createOrUpdate(array $data)
    {
        if (array_has($data, 'uuid')) {
            $user = User::where('uuid', $data['uuid'])->firstOrFail();
            $user->name = $data['name'];
            $user->enabled = $data['enabled'];
            $user->save();

            return $user;
        }

        return User::create($data);
    }

    public function toggle($uuid, $activate = true)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $user->enabled = $activate;

        return $user->save();
    }

    // TODO: End user's authentication/authorization.
    public function checkPassword($email, $password)
    {
        return User::where('email', $email)->where('password', $password)->first();
    }

    public function changePassword($uuid, $oldPassword, $newPassword)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $user->enabled = $activate;

        return $user->save();
    }
}
