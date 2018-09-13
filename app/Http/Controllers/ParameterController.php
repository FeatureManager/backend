<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * The Parameter Repository Instance.
     *
     * @var Parameter
     */
    protected $parameter = null;

    /**
     * Injecting Parameter Repository Abstraction.
     *
     * @param Parameter $parameter
     */
    public function __construct(Parameter $parameter)
    {
        $this->parameter = $parameter;
    }

    public function list()
    {
        $parameters = $this->parameter->getAllParameters();

        return $parameters;
    }

    public function show($uuid)
    {
        $parameter = $this->parameter->getParameterById($uuid);

        return $parameter;
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|unique:parameters|max:255|alpha_dash',
            'enabled' => 'required',
        ]);

        $parameter = $this->parameter->createOrUpdate($request->toArray());

        return $parameter;
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
        $parameter = $this->parameter->toggle($uuid, $activate);

        return ['message' => $parameter];
    }

    public function process($key, $environment = null)
    {
        return [$this->parameter->process($key, $environment)];
    }
}
