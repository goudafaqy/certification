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
            'role' => 'مديري النظام',
        ]); 
        DB::table('roles')->insert([
            'role' => 'المدربين',
        ]);
        DB::table('roles')->insert([
            'role' => 'مسؤلي التخطيط',
        ]);
        DB::table('roles')->insert([
            'role' => 'مسؤلي الدعم الفني',
        ]);
        DB::table('roles')->insert([
            'role' => 'المتدربين',
        ]);
    }
}
