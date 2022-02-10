<?php

namespace Database\Seeders;

use App\Models\UserRoles;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRoles::insert([
            [
                'rus_id' => 1,
                'rle_id' => 3,
                'start_date' =>now()->toDateTimeString(),
                'end_date' => null
            ],
            [
                'rus_id' => 1,
                'rle_id' => 4,
                'start_date' => now()->toDateTimeString(),
                'end_date' => null
            ],
            [
                'rus_id' => 1,
                'rle_id' => 6,
                'start_date' => now()->toDateTimeString(),
                'end_date' => null
            ],
        ]);
    }
}
