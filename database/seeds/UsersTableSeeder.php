<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
                    'name'=>'esor',
                    'email'=>'esor.poudel@gmail.com',
                    'admin'=>1,
                    'password'=>bcrypt('password')
        ]);

        App\User::create([
            'name'=>'sandesh',
            'email'=>'sandesh@gmail.com',
            'password'=>bcrypt('password')
]);
    }
}
