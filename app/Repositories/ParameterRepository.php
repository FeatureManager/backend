<?php
namespace App\Repositories;

use App\Repositories\Contracts\Parameter as Contract;
use App\Parameter;

class ParameterRepository implements Contract
{
    public function getAllParameters()
    {
        return Parameter::all();
    }
 
    public function getParameterById($uuid)
    {
        return Parameter::where('uuid', $uuid)->firstOrFail();
    }

    public function createOrUpdate($data)
    {
        if (array_has($data, 'uuid')) {
            $parameter = Parameter::where('uuid', $data['uuid'])->firstOrFail();
            $parameter->name = $data['name'];
            $parameter->description = $data['description'];
            $parameter->enabled = $data['enabled'];

            return $parameter->save();
        }

        return Parameter::create($data);
    }

    public function toggle($uuid, $activate = true)
    {
        $parameter = Parameter::where('uuid', $uuid)->firstOrFail();
        $parameter->enabled = $activate;
        return $parameter->save();
    }
}
