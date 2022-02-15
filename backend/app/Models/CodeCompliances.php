<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeCompliances extends Model
{
    use HasFactory;

    protected $table = 'rpr_code_compliances';

    public function events()
    {
        return $this->belongsTo(Events::class, 'rev_id', 'id');
    }

    public function user_codes()
    {
        return $this->belongsTo(UserCodes::class, 'rcd_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(Documents::class, 'cmp_id', 'id');
    }

    public function verifications()
    {
        return $this->hasMany(RegulatorVerifications::class, 'cmp_id', 'id');
    }
    
}
