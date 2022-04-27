<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:120',
            'enable' => 'nullable',
            'password' => 'nullable',
            'email_verified_at' => 'nullable',
            'first_lastname' => 'required|max:100',
            'second_lastname' => 'required|max:100',
            'nro_ci' => 'nullable',
            'issued' => 'nullable|max:20',
            'nit' => 'nullable',
            'birthday_date' => 'nullable',
            'city' => 'nullable',
            'addres' => 'nullable',
            'landline' => 'nullable',
            'cell_personal' => 'required',
            'cell_work' => 'nullable',
            'email_personal' => 'required|email|max:120',
            'code_sap' => 'nullable|max:20',
            'code_employee_sap' => 'nullable|max:20',
            'code_teacher' => 'nullable|max:30',
            'change_password' => 'nullable|max:120',
            'creator_user' => 'nullable',
            'rate' => 'nullable|max:120',
            'field1' => 'nullable|max:120',
            'field2' => 'nullable|max:120',
            'field3' => 'nullable|max:120',
            'field4' => 'nullable|max:120',
            'field5' => 'nullable|max:120',
            'field6' => 'nullable|max:120',
            'field7' => 'nullable|max:120',
            'field8' => 'nullable|max:120',
        ];
    }
}
