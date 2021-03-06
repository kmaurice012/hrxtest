<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    use HasFactory;

    protected $table = 'rpr_organizations';

    public function org_codes()
    {
        return $this->hasMany(OrgCodes::class, 'ror_id', 'id');
    }

    public function org_users()
    {
        return $this->hasMany(OrgUsers::class, 'ror_id', 'id');
    }
    public function periods()
    {
        return $this->hasMany(Periods::class, 'ror_id', 'id');
    }
    public function org_type()
    {
        $this->hasMany(Organizations::class, 'oty_id', 'id');
    }
}
