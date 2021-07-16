<?php
use App\Models\Physician;
use Faker\Generator as Faker;

$factory->define(App\Models\Physician::class, function (Faker $faker) {
    return [
        //

        'name'						=>$faker->sentence(3),
        'speciality_id'				=>rand(1,3),
        'tel'						=>$faker->text(13),
        'email'						=>$faker->unique()->safeEmail,
        'address'					=>$faker->sentence(2),
        'physician_order_number'	=>$faker->sentence(1),
    ];
});