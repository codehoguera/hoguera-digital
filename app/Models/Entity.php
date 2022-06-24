<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_sie_entity',
        'name_entity', 
        'dependence',
        'status',
        'municipal_district',
        'educational_district',
        'religious_work',
        'monthly_payment',
        'address', 
        'school_principal', 
        'x_coordinate',
        'y_coordinate',
        'morning_shift',
        'late_shift',
        'night_shift',
        'ini1',
        'ini2',
        'ini3',
        'init',
        'pri1',
        'pri2',
        'pri3',
        'pri4',
        'pri5',
        'pri6',
        'prit',
        'sec1',
        'sec2',
        'sec3',
        'sec4',
        'sec5',
        'sec6',
        'sect',
    ];

    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }

    //relacion muchos a muchos
    public function userDate()
    {
        return $this->belongsToMany(UserDate::class);
    }

}
