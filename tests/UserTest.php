<?php

class UserTest extends TestCase
{
    public function testListUsers()
    {
        $this->get('admin/user');
        $this->seeStatusCode(200);
        $this->seeJson([
            'enabled' => 1,
        ]);
    }

    public function testCreateUser()
    {
        $data = factory(\App\User::class)->make()->toArray();
        unset($data['uuid']);
        $this->post('admin/user', $data);
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $data['name'],
         ]);
    }

    public function testShowUser()
    {
        $user = \App\User::first();
        $this->get('admin/user/'.$user->uuid);
        $this->seeStatusCode(200);
        $this->seeJsonContains([
            'name' => $user->name,
        ]);
    }

    public function testUpdateUser()
    {
        $user = \App\User::first();
        $name = $user->name;
        $user->name = '';
        $this->put('admin/user', $user->toArray());
        $this->seeStatusCode(422);

        $user->name = $name.'-Updated';
        $this->put('admin/user', $user->toArray());
        //dd($this->response);
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $user->name,
         ]);
    }

    public function testEnableUser()
    {
        $user = \App\User::first();
        $this->put('admin/user/'.$user->uuid, $user->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testDisableUser()
    {
        $user = \App\User::first();
        $this->delete('admin/user/'.$user->uuid, $user->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }
}
