<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('secret'), // secret
        'remember_token' => Str::random(10),
        'role_id' => 3,
        'document' => $faker->unique()->randomNumber,
        'phone' => rand(),
        'code' => rand(),
        'member_id' => 1,
        'gender_id' => 1,
        'area' => rand(),
        'city_id' => 5107,
        'created_at' => now(),
        'updated_at' => now(),

    ];
});
