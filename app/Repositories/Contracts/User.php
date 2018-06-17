<?php

namespace App\Repositories\Contracts;

interface User
{
    public function getAllUsers();

    public function getUserById($uuid);

    /**
     * If $data array has no uuid field createOrUpdate will create the model
     * else it will update the model returned model given by uuid field.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function createOrUpdate(array $data);
}
