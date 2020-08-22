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
<<<<<<< HEAD
            'national_id' => 215555,
            'mobile' => 2155553337,
            'gender' => 3,
=======
            'national_id' => 215588787,
            'mobile' => 21555587,
            'gender' => 1,
>>>>>>> 979e6d407bfc32e130c412662266adbf13b5e980
            'password' => Hash::make('123456'),
        ]);
            
        DB::table('users')->insert([
            'name_ar' => 'ابراهيم نجم',
            'name_en' => 'Ibrahim Negm',
            'username' => 'negm',
            'email' => 'negm@gmail.com',
            'active' => true,
            'national_id' => 215588787,
            'mobile' => 21555587,
            'gender' => 1,
            'password' => Hash::make('123456'),
        ]);
    }
}
