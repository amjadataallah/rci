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
        DB::table('users')->insert([
            'username' => 'amjad.ataallah',
            'email' => 'ataallah.amjad@gmail.com',
            'mobile' => '0599721158',
            'date_of_birth' => date('Y-m-d'),
            'password' => bcrypt('1234567890'),
        ]);
    }
}
