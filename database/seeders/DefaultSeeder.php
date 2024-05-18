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
        DB::table('bled_by')->insert([
            ['first_name' => 'patty', 'middle_name' => 'putty', 'last_name' => 'petty', 'sex_id' => 2, 'region' => 13, 'province' => 1375, 'municipality' => 137504, 'barangay' => 137504017, 'street' => '121 Alert Compunt', 'zip_code' => '3232'],
            ['first_name' => 'mark', 'middle_name' => 'relos', 'last_name' => 'kinko', 'sex_id' => 1, 'region' => 13, 'province' => 1375, 'municipality' => 137504, 'barangay' => 137504017, 'street' => '121 Alert Compunt', 'zip_code' => '3232'],
        ]);
        DB::table('venues')->insert([
            ['name' => 'Alert', 'region' => 13, 'province' => 1375, 'municipality' => 137504, 'barangay' => 137504017, 'street' => '121 Alert Compunt', 'zip_code' => '3232'],
        ]);
        DB::table('donation_types')->insert([
            ['type' => 'Non-Patient Blood Donation'],
            ['type' => 'Direct-Patient Blood Donation'],
        ]);
        DB::table('deferral_types')->insert([
            ['type' => 'Temporary Deferral'],
            ['type' => 'Permanent Deferral'],
        ]);
        DB::table('deferral_categories')->insert([
            ['deferral_type_id' => 1, 'category' => 'History and P.E'],
            ['deferral_type_id' => 1, 'category' => 'Abnormal hemoglobin'],
            ['deferral_type_id' => 1, 'category' => 'Other reasons'],
        ]);
        DB::table('deferral_categories')->insert([
            ['deferral_type_id' => 2, 'category' => 'HIV'],
            ['deferral_type_id' => 2, 'category' => 'Hepatitis'],
            ['deferral_type_id' => 2, 'category' => 'syphilis'],
            ['deferral_type_id' => 2, 'category' => 'Other reasons'],
        ]);
    }
}
