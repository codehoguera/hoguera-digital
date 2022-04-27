<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_regional',
        'code_suc',
    ];
    
    public function userDate()
    {
        return $this->hasMany(UserDate::class);
    }
}
