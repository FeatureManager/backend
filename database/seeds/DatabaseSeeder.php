<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Environment::class, 10)->create();
        factory(App\Feature::class, 10)->create();
        factory(App\Parameter::class, 10)->create();
        factory(App\Strategy::class, 10)->create();

        // Populate pivot tables for Envionments.
        $environments = App\Environment::all();

        App\Feature::all()->each(function ($feature) use ($environments) {
            $feature->environments()->attach(
                $environments->random(rand(1, 3))->pluck('id')->toArray(),
                ['sequence' => rand(1, 3)]
            );
        });

        App\Parameter::all()->each(function ($parameter) use ($environments) {
            $parameter->environments()->attach(
                $environments->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Populate pivot tables for Features
        $features = App\Feature::all();

        App\Strategy::all()->each(function ($strategy) use ($features) {
            $strategy->features()->attach(
                $features->random(rand(1, 3))->pluck('id')->toArray(),
                ['input' => '']
            );
        });
    }
}
