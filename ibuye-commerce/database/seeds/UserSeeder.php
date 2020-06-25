<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
             'name' => 'jaweher',
             'lastname'=>'ben khalfa',
             'role' =>'admin',
             'telephone'=>'52985080',
             'email' => 'jaweher@gmail.com',
             'password' => Hash::make('jaweher@gmail.com'),
        ]);
    }
}
