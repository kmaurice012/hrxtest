<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    use HasFactory;

    protected $table = 'organizations';

    public function org_codes()
    {
        $this->hasMany(OrgCodes::class, 'ror_id', 'id');
    }

    public function org_users()
    {
        $this->hasMany(OrgUsers::class, 'ror_id', 'id');
    }
}
