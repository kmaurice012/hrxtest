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
        $this->belongsTo(Roles::class, 'parent_id', 'id');
    }

    public function codes()
    {
        $this->belongsTo(Codes::class, 'cds_id', 'id');
    }

    public function children()
    {
        $this->hasMany(Roles::class, 'parent_id', 'id');
    }

    public function user_roles()
    {
        $this->hasMany(UserRoles::class, 'rle_id', 'id');
    }
}
