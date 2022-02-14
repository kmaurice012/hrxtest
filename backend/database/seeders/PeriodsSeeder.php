<?php

namespace Database\Seeders;

use App\Models\Periods;
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
                'roc_id' =>1,
                'period_name' =>'Financial Year',
                'start_date'=>now()->toDateTimeString(),
                'end_date'=>null

            ]
        ]);
    }
}
