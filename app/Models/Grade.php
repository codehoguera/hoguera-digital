<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use HasFactory, HasFactory, SoftDeletes;

    protected $fillable = [
        'name_grade',
        'cycle',
        'cover',
    ];

    //relacion de muchos a muchos
    public function userDate() {
        return $this->belongsToMany(UserDate::class);
    }


}
