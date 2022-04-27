<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\UserDate;

class UserController extends Controller
{
    public function index() 
    {
        
        $users = UserDate::all();
        
        return view('/home', compact('users'));

        //return User::find(1)->userDate;//->regional;//->name_regional;

        // return Regional::find(2)->userDate;

    }

    public function create() 
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request) 
    {
        User::create([
            'email' => $request->email,
            'password' => $request->password,
            'email_verified_at' => $request->email_verified_at,
        ]);
        
        UserDate::create([
            'name' => $request->name,
            'first_lastname' => $request->first_lastname,
            'second_lastname' => $request->second_lastname,
            'email_personal' => $request->email_personal,
            'cell_personal' => $request->cell_personal,
        ]);

    }

    public function edit($id) 
    {
        $user = User::findOrFail($id);
        $user_date = $user->userDate;

        return view('edit', compact('user', 'user_date'));
    }

    public function update(StoreUserRequest $request, $id) 
    {
        $user = User::find($id);
        $user->update($request->all());

        $user->userDate->update([
            'name' => $request->name, 
            'enable' => $request->enable, 
            'first_lastname' => $request->first_lastname, 
            'second_lastname' => $request->second_lastname,
            'nro_ci' => $request->nro_ci,
            'issued' => $request->issued, 
            'nit' => $request->nit,
            'birthday_date' => $request->birthday_date, 
            'city' => $request->city, 
            'addres' => $request->addres, 
            'landline' => $request->landline, 
            'cell_personal' => $request->cell_personal, 
            'cell_work' => $request->cell_work,
            'email_personal' => $request->email_personal, 
            'code_sap' => $request->code_sap, 
            'code_employee_sap' => $request->code_employee_sap, 
            'code_teacher' => $request->code_teacher, 
            'change_password' => $request->change_password, 
            'creator_user' => $request->creator_user,
            'rate' => $request->rate, 
            'field1' => $request->field1, 
            'field2' => $request->field2, 
            'field3' => $request->field3, 
            'field4' => $request->field4, 
            'field5' => $request->field5, 
            'field6' => $request->field6, 
            'field7' => $request->field7, 
            'field8' => $request->field8,
        ]);
 
        $notification = 'Se actualizaron los datos correctamente.';
        return redirect('/home')->with(compact('notification'));
    }

    public function destroy($id) 
    {
        $user = User::findOrFail($id)->userDate;
        $user->delete();
        $notification = 'Se elimino correctamente';
        return back()->with(compact('notification'));
    }

    public function restore($id) 
    {
        User::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function restoreAll() 
    {
        User::onlyTrashed()->restore();
        return redirect()->back();
    }
}
