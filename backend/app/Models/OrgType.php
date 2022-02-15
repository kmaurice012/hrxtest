<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgType extends Model
{
    use HasFactory;

    protected $table = 'rpr_org_type';

    public function organizations()
    {
        $this->belongsTo(Organizations::class, 'oty_id', 'id');
    }
}
