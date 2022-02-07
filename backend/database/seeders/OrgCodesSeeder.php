<?php

namespace Database\Seeders;

use App\Models\OrgCodes;
use Illuminate\Database\Seeder;

class OrgCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrgCodes::insert([
            [
                'cds_id' => '1',
                'ror_id' => '1',
                'start_date' => '2022-02-07',
                'end_date' => null
            ],
            [
                'cds_id' => '3',
                'ror_id' => '1',
                'start_date' => '2022-02-07',
                'end_date' => null
            ],
            [
                'cds_id' => '3',
                'ror_id' => '2',
                'start_date' => '2022-02-07',
                'end_date' => null
            ],
            [
                'cds_id' => '4',
                'ror_id' => '2',
                'start_date' => '2022-02-07',
                'end_date' => null
            ]
        ]);
    }
}
