<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'مدير النظام',
            'name' => 'admin',
        ]); 
        DB::table('roles')->insert([
            'role' => 'مدرب',
            'name' => 'instructor',
        ]);
        DB::table('roles')->insert([
            'role' => 'مسؤول التخطيط',
            'name' => 'planner',
        ]);
        DB::table('roles')->insert([
            'role' => 'مسؤول الدعم الفني',
            'name' => 'support',
        ]);
        DB::table('roles')->insert([
            'role' => 'متدرب',
            'name' => 'trainee',
        ]);
    }
}
