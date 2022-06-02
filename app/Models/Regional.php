<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code_suc',
    ];
    
    public function userDate()
    {
        return $this->hasMany(UserDate::class);
    }

    public function entities()
    {
        return $this->hasMany(Entity::class);
    }
}
