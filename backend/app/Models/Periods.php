<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periods extends Model
{
    use HasFactory;

    protected $table = 'rpr_periods';

    public function org_codes()
    {
        return $this->belongsTo(OrgCodes::class, 'roc_id', 'id');
    }
}
