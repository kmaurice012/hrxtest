<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodesFrequency extends Model
{
    use HasFactory;

    protected $table = 'codes_frequency';

    public function codes()
    {
        $this->hasMany(Codes::class, 'fr_id', 'id');
    }
}
