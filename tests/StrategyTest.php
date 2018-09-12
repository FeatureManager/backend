<?php

class StrategyTest extends TestCase
{
    public function testListStrategies()
    {
        $this->get('admin/strategy');
        $this->seeStatusCode(200);
        $this->seeJson([
            'enabled' => 1,
        ]);
    }

    public function testCreateStrategy()
    {
        $name = 'Test_Strategy_'.date('Ymdhmisu');
        $data = [
            'name'        => $name,
            'description' => 'This is a sandbox strategy.',
            'enabled'     => true,
        ];
        $this->post('admin/strategy', $data);
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $name,
         ]);
    }

    public function testShowStrategy()
    {
        $strategy = \App\Strategy::first();
        $this->get('admin/strategy/'.$strategy->uuid);
        $this->seeStatusCode(200);
        $this->seeJsonContains([
            'name' => $strategy->name,
        ]);
    }

    public function testUpdateStrategy()
    {
        $strategy = \App\Strategy::first();
        $name = $strategy->name;
        $strategy->name = $name.' Updated';
        $this->put('admin/strategy', $strategy->toArray());
        $this->seeStatusCode(422);

        $strategy->name = $name.'-Updated';
        $this->put('admin/strategy', $strategy->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $strategy->name,
         ]);
    }

    public function testEnableStrategy()
    {
        $strategy = \App\Strategy::first();
        $this->put('admin/strategy/'.$strategy->uuid, $strategy->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testDisableStrategy()
    {
        $strategy = \App\Strategy::first();
        $this->delete('admin/strategy/'.$strategy->uuid, $strategy->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }
}
