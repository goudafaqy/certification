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
            'username' => 'Ayman',
            'email' => 'ayman@gmail.com',
            'active' => true,
            'password' => Hash::make('123456'),
            'mobile' => '123123123',
            'gender' => 1
        ]);

        DB::table('users')->insert([
            'name_ar' => 'ابراهيم نجم',
            'name_en' => 'Ibrahim Negm',
            'username' => 'negm',
            'email' => 'negm@gmail.com',
            'active' => true,
            'password' => Hash::make('123456'),
            'mobile' => '123123123',
            'gender' => 1
        ]);
    }
}
