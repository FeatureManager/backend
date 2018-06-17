<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\Environment;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    /**
     * The Environment Repository Instance.
     *
     * @var Environment
     */
    protected $environment = null;

    /**
     * Injecting Environment Repository Abstraction.
     *
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function list()
    {
        $environments = $this->environment->getAllEnvironments();

        return $environments;
    }

    public function show($uuid)
    {
        $environment = $this->environment->getEnvironmentById($uuid);

        return $environment;
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|unique:environments|max:255',
            'enabled' => 'required',
        ]);

        $environment = $this->environment->createOrUpdate($request->toArray());
        if (is_bool($environment)) {
            $environment = ['message' => $environment];
        }

        return $environment;
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
        $environment = $this->environment->toggle($uuid, $activate);

        return ['message' => $environment];
    }
}
