<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['country_id' => 1, 'name' => 'California', 'code' => 'CA'],
            ['country_id' => 1, 'name' => 'New York', 'code' => 'NY'],
            ['country_id' => 2, 'name' => 'Gujarat', 'code' => 'GJ'],
            ['country_id' => 2, 'name' => 'Maharashtra', 'code' => 'MH'],
        ];

        DB::table('states')->insert($states);
    }
}
