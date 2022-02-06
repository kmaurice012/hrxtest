<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeDetails extends Model
{
    use HasFactory;

    protected $table = 'code_details';

    public function code()
    {
        $this->belongsTo(Codes::class, 'cds_id', 'id');
    }
}
