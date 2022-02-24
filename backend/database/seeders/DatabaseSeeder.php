<?php

namespace Database\Seeders;

use App\Models\OrgUsers;
use App\Models\UserCodes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            FrequencySeeder::class,
            CodesSeeder::class,
            CodeDetailsSeeder::class,
            EventsSeeder::class,
            OrgTypeSeeder::class,
            OrganizationSeeder::class,
            PeriodsSeeder::class,
            OrgCodesSeeder::class,
            OrgUsersSeeder::class,
            RolesSeeder::class,
            UserRolesSeeder::class,
            UserCodesSeeder::class,
            CompliancesSeeder::class,
            DocumentsSeeder::class,
            RegulatorVerificationsSeeder::class,
            ActionsSeeder::class,

        ]);
    }
}
