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
          'studentNumber' => '1',
          'firstName' => 'Superadmin',
          'lastName' => 'Superadmin',
          'middleName' => 'Superadmin',
          'street'  => 'Avenue',
          'barangay'  => 'Bagtas',
          'municipality'  => 'Tanza',
          'province'  => 'Cavite',
          'dateOfBirth'  => '1998-01-20',
          'gender' => 'Male',
          'religion'  => 'Catholic',
          'citizenship'  => 'Filipino',
          'status'  => 'Single',
          'mobilePhone'  => '09876543211',
          'email'  => 'superadmin@mail.com',
          'password' => Hash::make('111'),
          'role' => 'superadmin', 
          'isActive' => true,
          'tempPassword' => 0,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s"),
        ],

    ]);
    }
}
