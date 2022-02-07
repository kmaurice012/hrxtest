<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username' => 'john',
            'password' => bcrypt('john@test'),
            'title' => 'test',
            'first_name' => 'John',
            'last_name' => 'Test',
            'gender' => 'male',
        ]);

        // User::insert([
        //     'username' => 'john',
        //     'password' => 'john@test',
        //     'title' => 'test',
        //     'first_name' => 'John',
        //     'last_name' => 'Test',
        //     'gender' => 'male',
        // ]);
    }
}
