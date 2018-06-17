<?php

class StrategyTest extends TestCase
{
    public function testListStrategies()
    {
        $this->get("strategy");
        $this->seeStatusCode(200);
        $this->seeJson([
            'enabled' => 1
        ]);
    }

    public function testCreateStrategy()
    {
        $name = 'Test Strategy ' . date('Ymdhmisu');
        $data = [
            'name' => $name,
            'description' => 'This is a sandbox strategy.',
            'enabled' => true
        ];

        $this->post("strategy", $data);
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $name,
         ]);
    }

    public function testShowStrategy()
    {
        $strategy = \App\Strategy::first();
        $this->get("strategy/" . $strategy->uuid);
        $this->seeStatusCode(200);
        $this->seeJsonContains([
            'name' => $strategy->name
        ]);
    }

    public function testUpdateStrategy()
    {
        $strategy = \App\Strategy::first();
        $updatedName = $strategy->name . ' Updated';
        $strategy->name = $updatedName;

        $this->put("strategy", $strategy->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testEnableStrategy()
    {
        $strategy = \App\Strategy::first();

        $this->put("strategy/" . $strategy->uuid, $strategy->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testDisableStrategy()
    {
        $strategy = \App\Strategy::first();

        $this->delete("strategy/" . $strategy->uuid, $strategy->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }
}
