<?php

use Illuminate\Database\Seeder;
use App\Models\Physician;
class PhysiciansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Models\Physician::class,25)->create();
    }
}
