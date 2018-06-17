<?php
namespace App\Repositories\Contracts;

interface Feature
{
    public function getAllFeatures();
 
    public function getFeatureById($uuid);

    /**
     * If $data array has no uuid field createOrUpdate will create the model
     * else it will update the model returned model given by uuid field.
     *
     * @param array $data
     * @return mixed
     */
    public function createOrUpdate(array $data);

    /**
     * Just sets the enabled field with $activate value.
     * it will update the model.
     *
     * @param Uiid $uuid
     * @param boolean $activate
     * @return boolean
     */
    public function toggle($uuid, $activate = true);
}
