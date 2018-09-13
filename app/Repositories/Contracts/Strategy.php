<?php

namespace App\Repositories\Contracts;

interface Strategy
{
    /**
     * Returns a Collection of Strategy Models.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAllStrategies();

    /**
     * Returns the Strategy Model by Uuid.
     *
     * @param Uuid $uuid
     *
     * @return \App\Strategy
     */
    public function getStrategyById($uuid);

    /**
     * If $data array has no uuid field createOrUpdate will create the model
     * else it will update the model and in both cases returns model.
     *
     * @param array $data
     *
     * @return Illuminate\Database\Eloquent\Model
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
