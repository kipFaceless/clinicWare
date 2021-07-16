<?php

use Illuminate\Database\Seeder;
use App\Models\Patient;
class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Patient::class,25)->create();
    }
}
