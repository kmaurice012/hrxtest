<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeDetails extends Model
{
    use HasFactory;

    protected $table = 'rpr_code_details';

    public function code()
    {
        return $this->belongsTo(Codes::class, 'cds_id', 'id');
    }
}
