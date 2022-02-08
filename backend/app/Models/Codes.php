<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codes extends Model
{
    use HasFactory;

    protected $table = 'codes';

    public function frequency()
    {
        return $this->belongsTo(CodesFrequency::class, 'fr_id', 'id');
    }

    public function code_details()
    {
        return $this->hasMany(CodeDetails::class, 'cds_id', 'id');
    }

    public function org_codes()
    {
        return $this->hasMany(OrgCodes::class, 'cds_id', 'id');
    }

    public function events()
    {
        return $this->hasMany(Events::class, 'cds_id', 'id');
    }

    public function roles()
    {
        return $this->hasMany(UserRoles::class, 'cds_id', 'id');
    }
}
