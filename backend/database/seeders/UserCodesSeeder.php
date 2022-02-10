<?php

namespace Database\Seeders;

use App\Models\UserCodes;
use Illuminate\Database\Seeder;

class UserCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserCodes::insert([
            'rus_id' => 1,
            'start_date' => now()->toDateTimeString(),
            'end_date' => now()->addDecade()->toDateTimeString(),
        ]);
    }
}
