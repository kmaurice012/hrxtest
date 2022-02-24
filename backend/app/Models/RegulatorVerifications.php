<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatorVerifications extends Model
{
    use HasFactory;

    protected $table = 'rpr_regulator_verifications';

    public function compliances()
    {
        return $this->belongsTo(CodeCompliances::class, 'cmp_id', 'id');
    }

    public function code_compliances()
    {
        return $this->compliances()->with('documents');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
}
