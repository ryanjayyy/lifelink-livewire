<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([
            ['role' => 'Admin'],
            ['role' => 'Member'],
        ]);
        DB::table('sexes')->insert([
            ['sex' => 'Male'],
            ['sex' => 'female'],
        ]);
        DB::table('blood_types')->insert([
            ['blood_type' => 'A+'],
            ['blood_type' => 'B+'],
            ['blood_type' => 'AB+'],
            ['blood_type' => 'O+'],
            ['blood_type' => 'A-'],
            ['blood_type' => 'B-'],
            ['blood_type' => 'AB-'],
            ['blood_type' => 'O-'],
        ]);
    }
}
