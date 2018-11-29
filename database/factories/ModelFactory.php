<?php

use App\Category;
use App\Client;
use App\Dish;
use App\Gallery;
use App\Image;
use App\Reservation;
use App\Table;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

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

User::flushEventListeners();
Client::flushEventListeners();
Category::flushEventListeners();
Dish::flushEventListeners();
Gallery::flushEventListeners();
Image::flushEventListeners();
Reservation::flushEventListeners();
Table::flushEventListeners();

$factory->define(User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->firstName . " " . $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'photo' => 'profile-default.png',
        'type' => $faker->randomElement([User::USUARIO_ADMINISTRADOR, User::USUARIO_REGULAR, User::USUARIO_SUPER]),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Client::class, function (Faker $faker){
  return [
    'name' => $faker->firstName . " " . $faker->lastName,
    'phone' => $faker->e164PhoneNumber,
    'email' => $faker->unique()->safeEmail,
  ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
      'name' => $faker->unique()->word,
    	'description' => $faker->paragraph(1),
      'icon' => str_random(15),
    ];
});

$factory->define(Table::class, function(Faker $faker){
  return [
    'number' => $faker->randomLetter . "-" . $faker->randomDigit,
    'price' => $faker->numberBetween($min = 300, $max = 1000),
    'status' => Table::MESA_DISPONIBLE,
    'size' => $faker->numberBetween($min = 2, $max = 8),
  ];
});

$factory->define(Image::class, function(Faker $faker){
  return [
    'name' => $faker->word,
    'uri' => str_random(25) . "." . $faker->randomElement(['jpg','png','svg','jpeg']),
  ];
});

$factory->define(Dish::class, function(Faker $faker){
  return [
    'name' => $faker->word,
    'price' => $faker->numberBetween($min = 20, $max = 1000),
    'description' => $faker->text($maxNoChars = 100),
    'status' => Dish::PLATILLO_DISPONIBLE,
    'gallery_id' => Gallery::all()->random()->id,
    'category_id' => Category::all()->random()->id,
  ];
});

$factory->define(Reservation::class, function(Faker $faker){
  $hour = $faker->numberBetween($min = 7, $max = 19);
  $date = Carbon::create(2018, 11, 28, 0, 0, 0); 
  return [
    'date' => $date->addDays(rand(1, 3))->format('Y-m-d'),
    'hour' => Carbon::createFromTime($hour, 0),
    'clients_quantity' => $faker->numberBetween($min = 1, $max = 3),
    'payment' => $faker->randomElement([Reservation::PROMOCION_EFECTIVO, Reservation::CUPON,
      Reservation::EFECTIVO, Reservation::TARJETA, Reservation::INVITACION, Reservation::PROMOCION]),
    'details' => $faker->text($maxNoChars = 50),
    'occasion' => $faker->text($maxNoChars = 30),
    'client_id' => App\Client::all()->random()->id,
    'table_id' => Table::all()->random()->id,  
  ];
});

$factory->define(Gallery::class, function(Faker $faker){
  return [
    'name' => $faker->word,
    'description' => $faker->text($maxNoChars = 100),
    'category_id' => Category::all()->random()->id,
  ];
});