<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class OrgUsers extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'org_users';

    public function organization()
    {
        $this->belongsTo(Organizations::class, 'ror_id', 'id');
    }

    public function user_roles()
    {
        $this->hasMany(UserRoles::class, 'rus_id', 'id');
    }

    public function user_codes()
    {
        $this->hasMany(UserCodes::class, 'rus_id', 'id');
    }
}
