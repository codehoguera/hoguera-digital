<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mockery\Matcher\Subset;

class UserDate extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'regional_id',
        'name',
        'first_lastname',
        'second_lastname',
        'nro_ci',
        'issued',
        'nit',
        'birthday_date',
        'city',
        'addres',
        'landline',
        'cell_personal',
        'cell_work',
        'email_personal',
        'code_sap',
        'code_employee_sap',
        'code_teacher',
        'change_password',
        'rate_hoguera',
        'rate_alpema',
        'verify_data',
        'pos_hoguera_id',
        'field1',
        'field2',
        'field3',
        'field4',
        'field5',
        'field6',
        'field7',
        'field8',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }

    //relacion muchos a muchos
    public function entities()
    {
        return $this->belongsToMany(Entity::class);
    }

    //relacion muchos a muchos
    public function grades()
    {
        return $this->belongsToMany(Grade::class);
    }

    //relacion muchos a muchos
    public function subjects() 
    {
        return $this->belongsToMany(Subset::class);
    }

}