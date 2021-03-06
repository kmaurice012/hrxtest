<?php

namespace Database\Seeders;

use App\Models\Organizations;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organizations::insert([
            [

                'oty_id' =>1,
                'organization_name' => 'STL',
                'primary_color' => 'red',
                'secondary_color1' => 'white',
                'secondary_color2' => 'black',
                'secondary_color3' => 'crimson'
            ],
            [
                'oty_id' =>1,
                'organization_name' => 'Safaricom',
                'primary_color' => 'green',
                'secondary_color1' => 'white',
                'secondary_color2' => 'black',
                'secondary_color3' => 'red'
            ],
            [
                'oty_id' =>1,
                'organization_name' => 'KCB',
                'primary_color' => 'green',
                'secondary_color1' => 'white',
                'secondary_color2' => 'black',
                'secondary_color3' => 'olive'
            ]
        ]);
    }
}
