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

    protected $table = 'rpr_org_users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function organization()
    {
        return $this->belongsTo(Organizations::class, 'ror_id', 'id');
    }

    public function user_roles()
    {
        return $this->hasMany(UserRoles::class, 'rus_id', 'id');
    }

    public function user_codes()
    {
        return $this->hasMany(UserCodes::class, 'rus_id', 'id');
    }
}
