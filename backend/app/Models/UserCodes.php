<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCodes extends Model
{
    use HasFactory;

    protected $table = 'user_codes';

    public function roles()
    {
        return $this->belongsTo(OrgUsers::class, 'rus_id', 'id');
    }
}
