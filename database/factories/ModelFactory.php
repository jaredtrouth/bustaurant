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

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $name = title_case($faker->unique()->words($faker->numberBetween(1,4), true));
    $slug = str_slug($name);

    return [
        'title' => $name,
        'slug' => $slug,
        'body' => $faker->paragraphs(3,true),
        'user_id' => 1,
    ];
});

$factory->define(App\MenuItem::class, function (Faker\Generator $faker) {
    $name = title_case($faker->unique()->words($faker->numberBetween(1,4), true));
    $slug = str_slug($name);

    return [
        'name' => $name,
        'slug' => $slug,
        'image_path' => 'public/menuitems/OsFwN0Dc27iKkaUv6W3ObcDr7yMEhRk2DUJSI0Bg.jpeg',
        'description' => $faker->text(300),
        'price' => $faker->randomDigit,
        'active' => $faker->boolean,
    ];
});

$factory->define(App\Service::class, function (Faker\Generator $faker) {
  $starttime = new DateTime('2017-'.$faker->month.'-'.$faker->dayOfMonth.' 11:30:00');
  $endtime = new DateTime($starttime->format('r') . ' + 3 hours');

    return [
        'starttime' => $starttime,
        'endtime' => $endtime,
        'loc_lat' => $faker->latitude,
        'loc_long' => $faker->longitude,
        'loc_name' => $faker->company,
        'loc_address' => $faker->address,
    ];
});
