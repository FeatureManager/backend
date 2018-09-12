<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\Strategy;
use Illuminate\Http\Request;

class StrategyController extends Controller
{
    /**
     * The Strategy Repository Instance.
     *
     * @var Strategy
     */
    protected $strategy = null;

    /**
     * Injecting Strategy Repository Abstraction.
     *
     * @param Strategy $strategy
     */
    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function list()
    {
        $strategies = $this->strategy->getAllStrategies();

        return $strategies;
    }

    public function show($uuid)
    {
        $strategy = $this->strategy->getStrategyById($uuid);

        return $strategy;
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|unique:strategies|max:255|alpha_dash',
            'enabled' => 'required',
        ]);

        $strategy = $this->strategy->createOrUpdate($request->toArray());

        return $strategy;
    }

    public function toggle(Request $request, $uuid)
    {
        $this->validate($request, [
            'uuid' => 'required',
        ]);

        $activate = true;
        if ($request->getMethod() == 'DELETE') {
            $activate = false;
        }
        $strategy = $this->strategy->toggle($uuid, $activate);

        return ['message' => $strategy];
    }
}
