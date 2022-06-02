<?php

namespace App\Http\Requests;

use App\Models\User;
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
        $userId = User::find(Auth()->id());
        $roleName = $userId->getRoleNames()[0];

        $rules = [
            'email' => 'required|email|max:120|unique:users',
            'enable' => 'boolean',
            'name' => 'required|string|max:120',
            'first_lastname'  => 'required|string|max:100',
            'second_lastname'  => 'required|string|max:100',
            'nro_ci' => 'nullable|numeric',
            'issued' => 'nullable|string|max:20',
            'nit' => 'nullable|numeric',
            'birthday_date' => 'nullable|date',
            'city' => 'nullable|string|max:30',
            'addres' => 'nullable|string|max:500',
            'landline' => 'nullable|numeric',
            'cell_personal' => 'required|numeric',
            'cell_work' => 'nullable|numeric|nullable',
            'email_personal' => 'nullable|email|max:120',
            'code_sap' => 'nullable|string|max:20',
            'code_employee_sap' => 'nullable|string|max:20',
            'code_teacher' => 'nullable|string|max:30',
            'change_password' => 'nullable|boolean',
            'rate_hoguera' => 'nullable',
            'rate_alpema' => 'nullable',
            'verify_data' => 'nullable|boolean',
            'pos_hoguera_id' => 'nullable|numeric',
            'field1' => 'nullable|string',
            'field2' => 'nullable|string',
            'field3' => 'nullable|string',
            'field4' => 'nullable|string',
            'field5' => 'nullable|string',
            'field6' => 'nullable|string',
            'field7' => 'nullable|string',
            'field8' => 'nullable|string',
        ];
        
        if($roleName == 'admin' && ! $this->get('regional_id'))
            $rules = array_merge($rules, ['regional_id' => 'required|exists:regionals,id']);

        if($this->get('password'))
            $rules = array_merge($rules, ['password' => 'required|confirmed|max:120']);

        return $rules;
    }

    
}
