<?php
namespace App\Repositories;

use App\Repositories\Contracts\Strategy as Contract;
use App\Strategy;

class StrategyRepository implements Contract
{
    public function getAllStrategies()
    {
        return Strategy::all();
    }
 
    public function getStrategyById($uuid)
    {
        return Strategy::where('uuid', $uuid)->firstOrFail();
    }

    public function createOrUpdate(array $data)
    {
        if (array_has($data, 'uuid')) {
            $strategy = Strategy::where('uuid', $data['uuid'])->firstOrFail();
            $strategy->name = $data['name'];
            $strategy->description = $data['description'];
            $strategy->enabled = $data['enabled'];

            return $strategy->save();
        }

        return Strategy::create($data);
    }

    public function toggle($uuid, $activate = true)
    {
        $strategy = Strategy::where('uuid', $uuid)->firstOrFail();
        $strategy->enabled = $activate;
        return $strategy->save();
    }
}
