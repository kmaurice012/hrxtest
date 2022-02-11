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
                'complied' => 'complied',
                'remarks' => 'This is a remark',
                'reviewed_date' => now()->toDateTimeString(),
                'from_date' => now()->toDateTimeString(),
                'end_date' => now()->addDecade()->toDateTimeString(),
            ]
        ]);
    }
}
