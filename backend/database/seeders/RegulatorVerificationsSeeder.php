<?php

namespace Database\Seeders;

use App\Models\RegulatorVerifications;
use Illuminate\Database\Seeder;

class RegulatorVerificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegulatorVerifications::insert([
            'rct_id' => 1,
            'id_users' => 1,
            'cmp_id' => 1,
            'comments' => 'this is a comment',
            'action_date' => '2022-02-08-10:00',
        ]);
    }
}
