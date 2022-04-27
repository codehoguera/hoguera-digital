<?php

namespace Database\Seeders;

use App\Models\UserDate;
use Illuminate\Database\Seeder;

class UserDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserDate::create([
            'user_id' => 1,
            'regional_id' => 1,
            'name' => 'Guido',
            'first_lastname' => 'Miranda',
            'second_lastname' => 'Avi',
            'nro_ci' => 1,
            'issued' => 1,
            'nit' => 1,
            'birthday_date' => '2022-04-20',
            'city' => 'Santa Cruz',
            'addres' => 'Av. bustamans',
            'landline' => 4,
            'cell_personal' => 4,
            'cell_work' => 4,
            'email_personal' => 'adc@gmail.com',
            'code_sap' => 'r',
            'code_employee_sap' => 'r',
            'code_teacher' => '1f1f1f',
            'change_password' => 1,
            'creator_user' => 1,
            'rate' => 1, 
            'field1' => '1',
            'field2' => '1',
            'field3' => '1',
            'field4' => '1',
            'field5' => '1',
            'field6' => '1',
            'field7' => '1',
            'field8' => '1',
        ]);
    }
}
