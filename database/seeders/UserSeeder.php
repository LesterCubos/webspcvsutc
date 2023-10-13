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
          'contact_number' => '09876543210',
          'address' => 'Blk 01 Lot 00 Superadmin Village',
          'guardian_name' => 'Superadmin S. Superadmin',
          'guardian_number' => '09123456789',
          'guardian_address' => 'Blk 01 Lot 00 Superadmin Village',
          'email' => 'superadmin@mail.com', 
          'password' => Hash::make('111'),
          'role' => 'superadmin', 
          'status' => 'active'
        ],

    ]);
    }
}
