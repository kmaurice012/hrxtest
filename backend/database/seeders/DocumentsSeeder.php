<?php

namespace Database\Seeders;

use App\Models\Documents;
use Illuminate\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documents::insert([
            'cmp_id' => 1,
            'doc_name' => 'NSE_Submition.pdf',
            'archive' => 1,
            'file_type' => 'pdf',
            'content' => chunk_split(base64_encode(file_get_contents('storage/app/public/Get_Started_With_Smallpdf.pdf'))),
            'file_size' => '70',
        ]);
    }
}
