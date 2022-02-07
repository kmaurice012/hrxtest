<?php

namespace Database\Seeders;

use App\Models\CodeDetails;
use Illuminate\Database\Seeder;

class CodeDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CodeDetails::insert([
            'cds_id' => 1,
            'parent_id' => 0,
            'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Purus in massa tempor nec feugiat nisl pretium fusce. Id neque aliquam vestibulum morbi blandit cursus risus.',
        ]);
    }
}
