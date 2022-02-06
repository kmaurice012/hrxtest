<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyVerifications extends Model
{
    use HasFactory;

    protected $table = 'body_verifications';

    public function code_compliances()
    {
        $this->belongsTo(CodeCompliances::class, 'cmp_id', 'id');
    }

    public function user()
    {
        $this->belongsTo(User::class, 'id_users', 'id');
    }
}
