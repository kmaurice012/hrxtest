<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Events::insert([
            [
                'cds_id' => 1,
                'event' => 'Listing Rules',
                'start_date' => '2022-02-05 09:00',
                'end_date' => '2022-02-06 12:00',
                'url' => '',
                'location' => '',
                'color' => 'red',
            ],
            [
                'cds_id' => 2,
                'event' => 'Late Submission of Audited Annual Accounts',
                'start_date' => '2022-02-05 09:00',
                'end_date' => '2022-02-06 12:00',
                'url' => '',
                'location' => '',
                'color' => 'blue',
            ],
            [
                'cds_id' => 3,
                'event' => 'Annual financial statements',
                'start_date' => '2022-02-05 09:00',
                'end_date' => '2022-02-06 12:00',
                'url' => '',
                'location' => '',
                'color' => 'green',
            ]
        ]);
    }
}
