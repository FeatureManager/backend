<?php

class EnvironmentTest extends TestCase
{
    public function testListEnvironments()
    {
        $this->get('admin/environment');
        $this->seeStatusCode(200);
        $this->seeJson([
            'enabled' => 1,
        ]);
    }

    public function testCreateEnvironment()
    {
        $name = 'Test Environment '.date('Ymdhmisu');
        $data = [
            'name'        => $name,
            'description' => 'This is a sandbox environment.',
            'enabled'     => true,
        ];

        $this->post('admin/environment', $data);
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $name,
         ]);
    }

    public function testShowEnvironment()
    {
        $environment = \App\Environment::first();
        $this->get('admin/environment/'.$environment->uuid);
        $this->seeStatusCode(200);
        $this->seeJsonContains([
            'name' => $environment->name,
        ]);
    }

    public function testUpdateEnvironment()
    {
        $environment = \App\Environment::first();
        $updatedName = $environment->name.' Updated';
        $environment->name = $updatedName;
        $this->put('admin/environment', $environment->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testEnableEnvironment()
    {
        $environment = \App\Environment::first();
        $this->put('admin/environment/'.$environment->uuid, $environment->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testDisableEnvironment()
    {
        $environment = \App\Environment::first();
        $this->delete('admin/environment/'.$environment->uuid, $environment->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }
}
