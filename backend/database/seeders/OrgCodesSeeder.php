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
                'cds_id' => 1,
                'ror_id' => 1,
                'prd_id' => 1,
                'due_date' => now()->addMonths(7)->toDateTimeString(),
                'start_date' => now()->toDateTimeString(),
                'end_date' => null
            ],
            [
                'cds_id' => 3,
                'ror_id' => 1,
                'prd_id' => 1,
                'due_date' => now()->addMonths(4)->toDateTimeString(),
                'start_date' => now()->toDateTimeString(),
                'end_date' => null
            ],
            [
                'cds_id' => 3,
                'ror_id' => 2,
                'prd_id' => 2,
                'due_date' => now()->addMonths(11)->toDateTimeString(),
                'start_date' => now()->toDateTimeString(),
                'end_date' => null
            ],
            [
                'cds_id' => 4,
                'ror_id' => 2,
                'prd_id' => 2,
                'due_date' => now()->addMonths(8)->toDateTimeString(),
                'start_date' => now()->toDateTimeString(),
                'end_date' => null
            ]
        ]);
    }
}
