<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgCodes extends Model
{
    use HasFactory;

    protected $table = 'rpr_org_codes';

    public function organization()
    {
        return $this->belongsTo(Organizations::class, 'ror_id', 'id');
    }
    public function code()
    {
        return $this->belongsTo(Codes::class, 'cds_id', 'id');
    }
    public function periods()
    {
        return $this->hasMany(Periods::class, 'roc_id', 'id');
    }
}
