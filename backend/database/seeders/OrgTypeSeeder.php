<?php

namespace Database\Seeders;

use App\Models\OrgType;
use Illuminate\Database\Seeder;

class OrgTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrgType::insert([
            [
                'org_type' => 'organization',
            ]
        ]);
    }
}
