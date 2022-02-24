<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actions extends Model
{
    use HasFactory;

    protected $table = 'rpr_actions';

    public function parent()
    {
        return $this->belongsTo(Actions::class, 'parent_id', 'id');
    }
    public function code_compliances()
    {
        return $this->belongsTo(CodeCompliances::class, 'cmp_id', 'id');
    }
    public function regulator()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function org_users()
    {
        return $this->belongsTo(OrgUsers::class, 'rus_id', 'id');
    }
}
