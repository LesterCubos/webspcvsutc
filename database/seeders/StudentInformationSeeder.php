<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $streetPrefixes = ['Street', 'Avenue', 'Lane'];
        $barangayPrefixes = ['Bagtas', 'Cabuco', 'Luciano', 'Purok 2'];
        $municipalityPrefixes = ['Trece Martires City', 'Tanza'];

        for ($i = 10; $i < 20; $i++) {
            DB::connection('mysql2')->table('enrollstudentinformation')->insert([
                'studentNumber' => '2023100' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'middleName' => $faker->randomElement(['Alex', 'James', 'Robert', 'John', 'Michael', 'William', 'David', 'Richard', 'Charles', 'Joseph']),
                'suffix' => $faker->suffix,
                'street' => $faker->randomElement($streetPrefixes),
                'barangay' => $faker->randomElement($barangayPrefixes),
                'municipality' => $faker->randomElement($municipalityPrefixes),
                'province' => 'Cavite',
                'dateOfBirth' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'religion' => $faker->randomElement(['Catholic', 'Christian', 'Muslim']),
                'citizenship' => 'Filipino',
                'status' => $faker->randomElement(['Single', 'Married', 'Widow']),
                'guardian' => $faker->name,
                'mobilePhone' => '09876543211',
                'email' => $faker->email,
                'yearAdmitted' => $faker->numberBetween(2018, 2023),
                'semesterAdmitted' => $faker->randomElement(['1st', '2nd']),
                'course' => $faker->randomElement(['BSIT', 'BSE', 'BEE', 'BSBA']),
                'cardNumber' => $faker->numberBetween(10000, 99999),
                'lastupdate' => $faker->numberBetween(2018, 2023),
                'highschool' => $faker->randomElement(['Dei Gracia Academy', 'Tanza National Trade School', 'Trece Martires City National High School']),
            ]);
        }
    }
}
