<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserDate extends Model
{
    use HasFactory;

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
        'creator_user',
        'rate',
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
        return $this->hasOne(User::class);
    }

    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }
}