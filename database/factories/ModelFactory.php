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

$factory->define(App\College::class, function (Faker\Generator $faker) {
    static $password;

    return [
        	'name' => str_random(10),
            'city' => str_random(10),
            'state' => str_random(10),
            'logo' => str_random(10),
            'description' => str_random(10),
            'active' => str_random(10),
            'website' => str_random(10),
            'email_domain' => str_random(10),
    ];
});

$factory->define(App\AppUser::class, function (Faker\Generator $faker) {
    static $password;

    return [
        	'name' => str_random(10),
            'college' => rand(0, 10)>5?'Union College':'ydSoSvXFKB',
            'year_of_graduation' => str_random(10),
            'mobile' => str_random(10),
            'mobile_verified' => rand(0, 10)>5?'yes':'no',
            'email' => str_random(10),
            'email_verified' => rand(0, 10)>5?'yes':'no',
            'password' => $password ?: $password = bcrypt('secret'),
            'verified' => rand(0, 10)>5?'yes':'no',
            'verification_timestamp' => str_random(10),
            'student' => rand(0, 10)>5?'yes':'no',
            'alumni' => rand(0, 10)>5?'yes':'no',
            'id_card' => str_random(10),
            'description' => str_random(10),
    ];
});
