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
            'name_ar' => 'محمد عماد',
            'name_en' => 'Muhammed instructor',
            'username' => 'Muhammed instructor',
            'email' => 'emad10@gmail.com',
            'role' => 'instructor',
            'active' => true,
            'password' => Hash::make('mohamed'),
        ]); 
    }
}
