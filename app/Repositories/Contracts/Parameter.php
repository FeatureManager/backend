<?php

namespace App\Repositories\Contracts;

interface Parameter
{
    /**
     * Returns a Collection of Parameter Models.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAllParameters();

    /**
     * Returns the Parameter Model by Uuid.
     *
     * @param Uuid $uuid
     *
     * @return \App\Parameter
     */
    public function getParameterById($uuid);

    /**
     * If $data array has no uuid field createOrUpdate will create the model
     * else it will update the model and in both cases returns model.
     *
     * @param array $data
     *
     * @return \App\Parameter
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
     * Truly process the params and returns the parameter value.
     *
     * @param string $key Parameter key name.
     * @param string $environment Environment name.
     *
     * @return mixed
     */
    public function process($key, $environment = null);
}
