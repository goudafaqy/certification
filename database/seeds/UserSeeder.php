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
            'name_ar' => 'محمد ابوالجود',
            'name_en' => 'Muhammed Goud',
            'username' => 'Muhammed Goud',
            'email' => 'mohgood2020@gmail.com',
            'role' => 'admin',
            'active' => true,
            'password' => Hash::make('mohamed'),
        ]);
    }
}
