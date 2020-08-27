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
            'national_id' => 215555,
            'mobile' => 2155553337,
            'gender' => 1,
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


        DB::table('users')->insert([
            'name_ar' => 'trainee 1',
            'name_en' => 'trainee 1',
            'username' => 'trainee1',
            'email' => 'trainee1@gmail.com',
            'active' => true,
            'national_id' => 215588787,
            'mobile' => 21555587,
            'gender' => 1,
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name_ar' => 'trainee 2',
            'name_en' => 'trainee 2',
            'username' => 'trainee2',
            'email' => 'trainee2@gmail.com',
            'active' => true,
            'national_id' => 215588787,
            'mobile' => 21555587,
            'gender' => 1,
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name_ar' => 'trainee 3',
            'name_en' => 'trainee 3',
            'username' => 'trainee3',
            'email' => 'trainee3@gmail.com',
            'active' => true,
            'national_id' => 215588787,
            'mobile' => 21555587,
            'gender' => 1,
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name_ar' => 'trainee 4',
            'name_en' => 'trainee 4',
            'username' => 'trainee4',
            'email' => 'trainee4@gmail.com',
            'active' => true,
            'national_id' => 215588787,
            'mobile' => 21555587,
            'gender' => 1,
            'password' => Hash::make('123456'),
        ]);
    }
}
