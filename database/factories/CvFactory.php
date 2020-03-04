<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CV;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(CV::class, function (Faker $faker) {
    $scheduleArray = ['full-time', 'part-time', 'overtime'];
    return [
    	 'first_name' => $faker->firstName($gender = null),
    	 'last_name' => $faker->lastName,
    	 'profession' => $faker->jobTitle,
    	 'salary' => $faker->randomDigit*1000,
    	 'currency' => $faker->currencyCode,
    	 'city' => $faker->city,
    	 'street_address' => $faker->address,
    	 'phone_number' => $faker->e164PhoneNumber,
    	 'email' => $faker->email,
    	 'education' => $faker->jobTitle,
    	 'experience' => $faker->randomDigit." year",
    	 'skills' => $faker->jobTitle,
    	 'language' => $faker->countryCode,
    	 'age' => $faker->numberBetween($min = 18, $max = 60),
    	 'schedule' => $scheduleArray[array_rand($scheduleArray)],
    	 'add_information' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    	 'user_id' => random_int(10, 12),
    	 'checked' => random_int(0, 1)
    ];
});
