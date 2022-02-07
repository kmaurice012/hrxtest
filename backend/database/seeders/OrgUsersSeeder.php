<?php

namespace Database\Seeders;

use App\Models\OrgUsers;
use Illuminate\Database\Seeder;

class OrgUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrgUsers::insert([
            [
                'ror_id' => 1,
                'username' => 'john_user',
                'password' => bcrypt('john@test.com'),
                'first_name' => 'John',
                'middle_name' => 'M',
                'last_name' => 'Test',

            ]
        ]);
    }
}
