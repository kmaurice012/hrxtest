<?php

namespace Database\Seeders;

use App\Models\CodesFrequency;
use Illuminate\Database\Seeder;

class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CodesFrequency::insert([
            [
                'frequency' => 'Daily',
                'unit' => 'day',
                'qty' => 1,
            ],
            [
                'frequency' => 'Weekly',
                'unit' => 'week',
                'qty' => 1,
            ],
            [
                'frequency' => 'Monthly',
                'unit' => 'month',
                'qty' => 1,
            ],
            [
                'frequency' => 'Quarterly',
                'unit' => 'month',
                'qty' => 3,
            ],
            [
                'frequency' => 'Bi-Annually',
                'unit' => 'month',
                'qty' => 6,
            ],
            [
                'frequency' => 'Annually',
                'unit' => 'year',
                'qty' => 1,
            ],
        ]);
    }
}
