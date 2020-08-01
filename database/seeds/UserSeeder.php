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
            'name_ar' => 'أيمن البري',
            'name_en' => 'Ayman Elbery',
            'username' => 'أيمن البري',
            'email' => 'ayman.bery@gmail.com',
            'role' => 'admin',
            'active' => true,
            'password' => Hash::make('123456'),
        ]);
    }
}
