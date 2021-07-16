<?php
use App\Models\Speciality;
use Faker\Generator as Faker;

$factory->define(App\Models\Speciality::class, function (Faker $faker) {
    return [
        //
        'name'		=>$faker->randomElement(['Dentista','Odontôlogo']),
    ];
});
