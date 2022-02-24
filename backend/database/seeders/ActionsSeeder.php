<?php

namespace Database\Seeders;

use App\Models\Actions;
use Illuminate\Database\Seeder;

class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actions::insert([
            // 'parent_id' => 1,
            'cmp_id' => 1,
            'id_user' => 1,
            'rus_id' => 1,
            'action_type' => 'comment',
            'comment' => 'This is a comment in actions',
            // 'verify_comment' => '',
            // 'reject_comment' => '',
            // 'rework_comment' => '',
        ]);
    }
}
