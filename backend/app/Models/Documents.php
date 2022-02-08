<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $table = 'documents';

    public function code_compliances()
    {
        return $this->belongsTo(CodeCompliances::class, 'cmp_id', 'id');
    }
}
