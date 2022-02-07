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
                'rcd_id' => '',
                'rev_id' => '',
                'reviewed_date' => '',
                'from_date' => '',
                'end_date' => '',
            ]
        ]);
    }
}
