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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Grade::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomNumber(2),
    ];
});

$factory->define(App\Total::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'porcent' => $faker->randomNumber(1)
    ];
});

$factory->define(App\FamilyDiscount::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'porcent' => $faker->randomNumber(1)
    ];
});

$factory->define(App\Custom::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'grade_id' => $factory->create(App\Grade::class)->id,
        'has_bros' => false,
        'bros' => 0,
        'name' => $faker->firstName,
        'last' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
    ];
});


