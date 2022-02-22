<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken as PersonalAccessToken;

class SanctumPersonalAccessToken extends PersonalAccessToken
{
    use HasFactory;

    protected $table = 'rpr_personal_access_tokens';
}
