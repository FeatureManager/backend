<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'uuid'    => $faker->uuid,
        'name'    => $faker->name,
        'email'   => $faker->unique()->email,
        'enabled' => true,
    ];
});

$factory->define(App\Environment::class, function (Faker\Generator $faker) {
    return [
        'uuid'        => $faker->uuid,
        'name'        => $faker->unique()->slug,
        'description' => $faker->text,
        'enabled'     => true,
    ];
});

$factory->define(App\Feature::class, function (Faker\Generator $faker) {
    return [
        'uuid'        => $faker->uuid,
        'name'        => $faker->unique()->slug,
        'description' => $faker->text,
        'enabled'     => true,
    ];
});

$factory->define(App\Parameter::class, function (Faker\Generator $faker) {
    return [
        'uuid'        => $faker->uuid,
        'name'        => $faker->unique()->slug,
        'value'       => $faker->userName,
        'description' => $faker->text,
        'enabled'     => true,
    ];
});

$factory->define(App\Strategy::class, function (Faker\Generator $faker) {
    return [
        'uuid'        => $faker->uuid,
        'name'        => $faker->unique()->slug,
        'description' => $faker->text,
        'enabled'     => true,
    ];
});
