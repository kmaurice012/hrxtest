<?php

namespace Database\Seeders;

use App\Models\CodeCompliances;
use Illuminate\Database\Seeder;

class CompliancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CodeCompliances::insert([
            [
                'rcd_id' => 1,
                'rev_id' => 1,
                'reviewed_date' => '2022-02-08 17:00',
                'from_date' => '2022-02-08',
                'end_date' => '2025-02-10',
            ]
        ]);
    }
}
