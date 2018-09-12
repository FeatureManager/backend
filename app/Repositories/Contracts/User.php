<?php

namespace App\Repositories\Contracts;

interface User
{
    /**
     * Returns a Collection of User Models.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers();

    /**
     * Returns the User Model by Uuid.
     *
     * @param Uuid $uuid
     *
     * @return \App\User
     */
    public function getUserById($uuid);

    /**
     * If $data array has no uuid field createOrUpdate will create the model
     * else it will update the model and in both cases returns model
     *
     * @param array $data
     *
     * @return \App\User
     */
    public function createOrUpdate(array $data);

    /**
     * Just sets the enabled field with $activate value it will update
     * the model.
     *
     * @param Uiid $uuid
     * @param bool $activate
     *
     * @return bool
     */
    public function toggle($uuid, $activate = true);

    /**
     * Changes the User password.
     *
     * @param Uiid $uuid
     * @param string $oldPassword
     * @param string $newPassword
     *
     * @return bool
     */
    public function changePassword($uuid, $oldPassword, $newPassword);
}
