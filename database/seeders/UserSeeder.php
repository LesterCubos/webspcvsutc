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
          'first_name' => 'Superadmin', 
          'surname' => 'Superadmin',
          'middle_name' => 'Superadmin',
          'student_number' => '1',
          'sex' => 'Male',
          'civil_status' => 'Single',
          'nationality' => 'Filipino',
          'religion' => 'Catholic',
          'age' => '28',
          'birthday' => '2023-10-13',
          'birth_place' => 'Tanza Cavite',
          'contact_number' => '09876543210',
          'address' => 'Blk 01 Lot 00 Superadmin Village',
          'postal_code' => '4108',
          'elementary_school' => 'Superadmin Elementary School',
          'juniorhigh_school' => 'Superadmin High School',
          'seniorhigh_school' => 'Superadmin Senior High School',
          'program' => 'None',
          'undergraduate_year' => 'None',
          'student_classification' => 'None',
          'registration_status' => 'None',
          'guardian_name' => 'Superadmin S. Superadmin',
          'guardian_number' => '09123456789',
          'guardian_occupation' => 'Superadmin',
          'guardian_address' => 'Blk 01 Lot 00 Superadmin Village',
          'email' => 'superadmin@mail.com', 
          'password' => Hash::make('111'),
          'role' => 'superadmin', 
          'status' => 'active',
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s"),
        ],

    ]);
    }
}
