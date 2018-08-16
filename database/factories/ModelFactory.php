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
        'newsletter' => $faker->boolean,
        'notification' => $faker->boolean,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => 'master',
    ];
});

$factory->define(App\Animaltype::class, function (Faker\Generator $faker) {
	return [
		'name' => 'name',
	];
});

$factory->define(App\Animal::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'animaltype_id' => 1,
        'sex' => $faker->randomElement($array = array ('samiec','samica')),
        'age' => $faker->biasedNumberBetween($min = 1, $max = 15),
        'location' => $faker->city,
        'homeless' => $faker->biasedNumberBetween($min = 0, $max = 2),
        'avatar' => 'uploads/img/pies.jpg',
        'description'=> $faker->paragraph,
        'added' => $faker-> dateTimeBetween($startDate = '-4 years', $endDate = 'now', $timezone = date_default_timezone_get()),
        'verified' => $faker->boolean,
        'user_id' => $faker->biasedNumberBetween($min = 1, $max = 3),
    ];
});

$factory->define(App\Page::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->word,
        'metatitle' => $faker->sentence,
        'metadescription' => $faker->sentence,
        'body' => $faker->paragraph,
        'news' => 1,
    ];
});

