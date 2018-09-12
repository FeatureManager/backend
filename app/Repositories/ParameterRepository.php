<?php

namespace App\Repositories;

use App\Environment;
use App\Parameter;
use App\Repositories\Contracts\Parameter as Contract;

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

    public function createOrUpdate(array $data)
    {
        if (array_has($data, 'uuid')) {
            $parameter = Parameter::where('uuid', $data['uuid'])->firstOrFail();
            $parameter->name = $data['name'];
            $parameter->description = $data['description'];
            $parameter->enabled = $data['enabled'];
            $parameter->save();
            
            return $parameter;
        }

        return Parameter::create($data);
    }

    public function toggle($uuid, $activate = true)
    {
        $parameter = Parameter::where('uuid', $uuid)->firstOrFail();
        $parameter->enabled = $activate;

        return $parameter->save();
    }

    public function process($key, $environment = null)
    {
        // Todo: must be implemented.
        // $ret = [];
        // if (!empty($environment)) {
        //     $environment = Environment::where('name', $environment)->with('parameters')->first();
        //     $ret = $environment->parameters()->where('parameters.name', $key)->get();
        // }
        // $ret = Parameter::where('name', $key)->first();

        // if (!empty($ret)) {
        //     return $ret->value;
        // } else {
        //     return '';
        // }
    }
}
