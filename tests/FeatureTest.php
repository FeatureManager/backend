<?php

class FeatureTest extends TestCase
{
    public function testListFeatures()
    {
        $this->get('admin/feature');
        $this->seeStatusCode(200);
        $this->seeJson([
            'enabled' => 1,
        ]);
    }

    public function testCreateFeature()
    {
        $name = 'Test Feature '.date('Ymdhmisu');
        $data = [
            'name'        => $name,
            'description' => 'This is a sandbox feature.',
            'enabled'     => true,
        ];
        $this->post('admin/feature', $data);
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $name,
         ]);
    }

    public function testShowFeature()
    {
        $feature = \App\Feature::first();
        $this->get('admin/feature/'.$feature->uuid);
        $this->seeStatusCode(200);
        $this->seeJsonContains([
            'name' => $feature->name,
        ]);
    }

    public function testUpdateFeature()
    {
        $feature = \App\Feature::first();
        $updatedName = $feature->name.' Updated';
        $feature->name = $updatedName;
        $this->put('admin/feature', $feature->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testEnableFeature()
    {
        $feature = \App\Feature::first();
        $this->put('admin/feature/'.$feature->uuid, $feature->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }

    public function testDisableFeature()
    {
        $feature = \App\Feature::first();
        $this->delete('admin/feature/'.$feature->uuid, $feature->toArray());
        $this->seeStatusCode(200);
        $this->seeJson([
            'message' => true,
         ]);
    }
}
