<?php

namespace App\Repositories\Contracts;

interface Environment
{
    /**
     * Returns a Collection of Environment Models.
     *
     * @return Illuminate\Database\Eloquent\Collection|\App\Environment[]
     */
    public function getAllEnvironments();

    /**
     * Returns the Environment Model by Uuid.
     *
     * @param Uuid $uuid
     *
     * @return \App\Environment
     */
    public function getEnvironmentById($uuid);

    /**
     * If $data array has no uuid field createOrUpdate will create the model
     * else it will update the model and in both cases returns model.
     *
     * @param array $data
     *
     * @return \App\Environment
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
}
