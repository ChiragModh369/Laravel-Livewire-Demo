<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['id' => 1, 'name' => 'United States', 'iso_code' => 'US'],
            ['id' => 2, 'name' => 'India', 'iso_code' => 'IN'],
        ];

        DB::table('countries')->insert($countries);
    }
}
