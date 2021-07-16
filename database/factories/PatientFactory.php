<?php
use App\Models\Patient;

use Faker\Generator as Faker;

$factory->define(App\Models\Patient::class, function (Faker $faker) {
     return [
        
        'name'							=>$faker->sentence(3),
        'date_of_birth'					=>$faker->date(),
        'identification'				=>$faker->randomElement(['Bilhete','Cédula', 'Passaporte', 'Acento']),

        'identification_number'			=>$faker->text(13),
        'address'						=>$faker->sentence(2),
        'sex'							=>$faker->randomElement(['M','F']),
        'tel'							=>$faker->text(13),
        'email'							=>$faker->unique()->safeEmail,
    ];
});
