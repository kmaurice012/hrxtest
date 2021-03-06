<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = 'rpr_events';

    public function code()
    {
        return $this->belongsTo(Codes::class, 'cds_id', 'id');
    }

    public function code_compliances()
    {
        return $this->hasMany(CodeCompliances::class, 'rev_id', 'id');
    }
}
