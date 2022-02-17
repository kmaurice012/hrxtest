<?php

namespace Database\Seeders;

use App\Models\Periods;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periods::insert([
            [
                'roc_id' => 1,
                'period_name' => 'Financial Year',
                'period_start_date' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-10-01 00:00:00'),
                'period_end_date' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-09-31 23:59:59')

            ]
        ]);
    }
}
