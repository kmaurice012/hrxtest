<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    use HasFactory;

    protected $table = 'user_roles';

    public function roles()
    {
        $this->belongsTo(Roles::class, 'rle_id', 'id');
    }

    public function org_users()
    {
        $this->belongsTo(OrgUsers::class, 'rus_id', 'id');
    }
}
