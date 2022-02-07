<?php

namespace Database\Seeders;

use App\Models\Codes;
use Illuminate\Database\Seeder;

class CodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Codes::insert([
            [
                'fr_id' => 1,
                'code' => 'NSE03',
                'serial_number' => 'Serial.03',
                'description' => 'Listing Rules',
                'color_code' => '#3a87ad',
            ],
            [
                'fr_id' => 4,
                'code' => 'NSE02',
                'serial_number' => 'Serial.02',
                'description' => 'Late Submission of Audited Annual Accounts',
                'color_code' => '#3a87ad',
            ],
            [
                'fr_id' => 6,
                'code' => 'NSE01',
                'serial_number' => 'Serial.01',
                'description' => 'Annual financial statements',
                'color_code' => '#3a87ad',
            ],
            [
                'fr_id' => 2,
                'code' => 'NSE04',
                'serial_number' => 'Serial.04',
                'description' => 'Trading hours',
                'color_code' => '#3a87ad',
            ],

        ]);
    }
}
