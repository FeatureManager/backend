<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * The User Repository Instance.
     *
     * @var User
     */
    protected $user = null;

    /**
     * Injecting User Repository Abstraction.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function list()
    {
        $user = $this->user->getAllUsers();

        return $user;
    }

    public function show($uuid)
    {
        $user = $this->user->getUserById($uuid);

        return $user;
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|unique:users|max:255',
        ]);

        $user = $this->user->createOrUpdate($request->toArray());

        return $user;
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
        $user = $this->user->toggle($uuid, $activate);

        return ['message' => $user];
    }
}
