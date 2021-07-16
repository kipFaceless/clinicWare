<?php


use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
     {
        
        

         User::create([
            'name'=> 'Carlos Ferreira',
            'email'=> 'carlos@especializati.com.br',
            'password'=> bcrypt('makarenko'),
            'type' 		=> 'physician',
            'avatar'	=>'',
            'address'   =>'Brasil'

        ]);


       User::create([
            'name'		=> 'Kip',
            'email'		=> 'kipfaceless@gmail.com',
            'password'	=> bcrypt('makarenko'),
            'type' 		=> 'admin',
            'avatar'	=>'',
            'address'   =>'Angola',
            'tel'   	=>'946207069'
        ]);


        User::create([
            'name'		=> 'Candida',
            'email'		=> 'candida@gmail.net',
            'password'	=> bcrypt('makarenko'),
            'type' 		=> 'receptionist',
            'avatar'	=>'',
            'address'   =>'Angola',
            'tel'   =>'992563422'
        ]);

        factory(User::class,25)->create();
    }
}
