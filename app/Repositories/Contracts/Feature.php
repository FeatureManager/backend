<?php

namespace App\Repositories\Contracts;

interface Feature
{
    /**
     * Returns a Collection of Feature Models.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAllFeatures();

    /**
     * Returns the Feature Model by Uuid.
     *
     * @param Uuid $uuid
     *
     * @return \App\Feature
     */
    public function getFeatureById($uuid);

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
