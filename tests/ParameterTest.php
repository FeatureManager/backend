<?php

class ParameterTest extends TestCase
{
    public function testListParameters()
    {
        $this->get('parameter');
        $this->seeStatusCode(200);
        $this->seeJson([
            'enabled' => 1,
        ]);
    }

    public function testCreateParameter()
    {
        $name = 'Test Parameter '.date('Ymdhmisu');
        $data = [
            'name'        => $name,
            'description' => 'This is a sandbox parameter.',
            'enabled'     => true,
        ];

        $this->post('parameter', $data);
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $name,
         ]);
    }

    public function testShowParameter()
    {
        $parameter = \App\Parameter::first();
        $this->get('parameter/'.$parameter->uuid);
        $this->seeStatusCode(200);
        $this->seeJsonContains([
            'name' => $parameter->name,
        ]);
    }

    public function testUpdateParameter()
    {
        $parameter = \App\Parameter::first();
        $updatedName = $parameter->name.' Updated';
        $parameter->name = $updatedName;

        $this->put('parameter', $parameter->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testEnableParameter()
    {
        $parameter = \App\Parameter::first();

        $this->put('parameter/'.$parameter->uuid, $parameter->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testDisableParameter()
    {
        $parameter = \App\Parameter::first();

        $this->delete('parameter/'.$parameter->uuid, $parameter->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }
}
