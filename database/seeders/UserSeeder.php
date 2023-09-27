<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        //superadmin
        [
          'name' => 'Superadmin', 
          'email' => 'superadmin@mail.com', 
          'password' => Hash::make('111'),
          'role' => 'superadmin', 
          'status' => 'active'
        ],

        [
            'name' => 'Superadmin1', 
            'email' => 'superadmin1@mail.com', 
            'password' => Hash::make('111'),
            'role' => 'superadmin', 
            'status' => 'active'
        ],

        //admin
        [
            'name' => 'Admin', 
            'email' => 'admin@mail.com', 
            'password' => Hash::make('111'),
            'role' => 'admin', 
            'status' => 'active'
        ],

        //student
        [
            'name' => 'Student', 
            'email' => 'student@mail.com', 
            'password' => Hash::make('111'),
            'role' => 'student', 
            'status' => 'active'
        ],

    ]);
    }
}
