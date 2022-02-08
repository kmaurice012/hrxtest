<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';

    public function parent()
    {
        return $this->belongsTo(Roles::class, 'parent_id', 'id');
    }

    public function codes()
    {
        return $this->belongsTo(Codes::class, 'cds_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Roles::class, 'parent_id', 'id');
    }

    public function user_roles()
    {
        return $this->hasMany(UserRoles::class, 'rle_id', 'id');
    }
}
