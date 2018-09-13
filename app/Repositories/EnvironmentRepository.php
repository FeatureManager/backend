<?php

namespace App\Repositories;

use App\Environment;
use App\Repositories\Contracts\Environment as Contract;

class EnvironmentRepository implements Contract
{
    public function getAllEnvironments()
    {
        return Environment::all();
    }

    public function getEnvironmentById($uuid)
    {
        return Environment::where('uuid', $uuid)->firstOrFail();
    }

    public function createOrUpdate(array $data)
    {
        if (array_has($data, 'uuid')) {
            $environment = Environment::where('uuid', $data['uuid'])->firstOrFail();
            $environment->name = $data['name'];
            $environment->description = $data['description'];
            $environment->enabled = $data['enabled'];
            $environment->save();

            return $environment;
        }

        return Environment::create($data);
    }

    public function toggle($uuid, $activate = true)
    {
        $environment = Environment::where('uuid', $uuid)->firstOrFail();
        $environment->enabled = $activate;

        return $environment->save();
    }
}
