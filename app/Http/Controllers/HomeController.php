<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use App\Models\User;
use App\Models\UserDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function password(Request $request) 
    {
        $request->validate([
            'password' => 'required|string|max:120|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::find(Auth()->id());

        if($user !== null)
        {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        
        $messages = 'Su contraseña fue cambiado correctamente';
        return back()->with(compact('messages'));

    }

    public function create() 
    {
        $cities = Regional::select('id', 'name')->get();
        $issueds = [
                    'BE','SC', 'CB','CH','TJ','LP','OR','PT',
                ];

        return view('create', compact('cities', 'issueds'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nro_ci' => 'required',
            'issued' => 'required',
            'nit' => 'required',
            'birthday_date' => 'required',
            'city' => 'required',
            'addres' => 'required',
            'landline' => 'required',
            'cell_work' => 'nullable',
            'email_personal' => 'required',
        ]);

        $user = User::find(Auth()->id());
        
        $user->enable = true;
        $user->save();

        $userDate = $user->userDate;
        $userDate->nro_ci = $request->nro_ci;
        $userDate->issued = $request->issued;
        $userDate->nit = $request->nit;
        $userDate->birthday_date = $request->birthday_date;
        $userDate->city = $request->city;
        $userDate->addres = $request->addres;
        $userDate->landline = $request->landline;
        $userDate->cell_work = $request->cell_work;
        $userDate->email_personal = $request->email_personal;

        $userDate->save();

        $messages = 'Los datos fueron guardados correctamente';
        return back()->with(compact('messages'));
        
    }
}
