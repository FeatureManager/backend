<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\Feature;

class FeatureController extends Controller
{
    /**
     * The Feature Repository Instance.
     *
     * @var Feature
     */
    protected $feature = null;

    /**
     * Injecting Feature Repository Abstraction.
     *
     * @param Feature $feature
     */
    public function __construct(Feature $feature)
    {
        $this->feature = $feature;
    }

    public function list()
    {
        $features = $this->feature->getAllFeatures();
        return $features;
    }

    public function show($uuid)
    {
        $feature = $this->feature->getFeatureById($uuid);
        return $feature;
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:features|max:255',
            'enabled' => 'required',
        ]);

        $feature = $this->feature->createOrUpdate($request->toArray());
        if (is_bool($feature)) {
            $feature = [ "message" => $feature ];
        }
        return $feature;
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
        $feature = $this->feature->toggle($uuid, $activate);
        return [ "message" => $feature ];
    }
}
