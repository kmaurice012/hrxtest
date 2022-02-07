<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::insert([
            [
                'parent_id' => null,
                'cds_id' => 3,
                'role' => 'Finance',
                'start_date' => '2020-02-07 11:20',
                'end_date' => null,
            ],
            [
                'parent_id' => null,
                'cds_id' => 4,
                'role' => 'Audit',
                'start_date' => '2020-02-07 11:20',
                'end_date' => null,
            ],
            [
                'parent_id' => 1,
                'cds_id' => 3,
                'role' => 'Annual financial statements',
                'start_date' => '2020-02-07 11:20',
                'end_date' => null,
            ],
            [
                'parent_id' => 2,
                'cds_id' => 4,
                'role' => 'Late Submission of Audited Annual Accounts',
                'start_date' => '2020-02-07 11:20',
                'end_date' => null,
            ],
            [
                'parent_id' => null,
                'cds_id' => 3,
                'role' => 'Sales',
                'start_date' => '2020-02-07 11:20',
                'end_date' => null,
            ],
            [
                'parent_id' => 5,
                'cds_id' => 2,
                'role' => 'Trading hours',
                'start_date' => '2020-02-07 11:20',
                'end_date' => null,
            ],
        ]);
    }
}
