<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Regional;
use App\Models\User;
use App\Models\UserDate;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\Permission\Models\Role;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status', ['except' => ['changePassword', 'saveChangePassword', 'verifyData', 'saveVerifyData']]);
    }

    public function index()
    {
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
        $users = [];
        switch($role){
            case 'admin':
                $users = User::with('roles')
                        ->whereHas('roles', function ($query) {
                            $query->whereNotIn('name', ['teacher', 'student', 'school-principal']);
                        })
                        ->select('id', 'email')
                        ->get();
                break;
            case 'admregional':
                $users = User::with('roles', 'userDate')
                        ->whereHas('roles', function ($query) {
                            $query->whereNotIn('name', ['teacher', 'student', 'school-principal']);
                        })
                        ->whereHas('userDate', function ($query) use ($user){
                            $query->where('regional_id', $user->userDate->regional_id);
                        })
                        ->select('id', 'email')
                        ->get();
                break;
            default:
                $users = [];
        }
        return view('users.index', compact('users'));
    }

    public function directorSearch()
    {
        $directores = [];

        return view('users.directores.director', compact('directores'));
    }

    public function director(Request $request) 
    {
        $validated = $request->validate([
            'query' => 'required|string',
        ]);
        $search = $request->get('query'); 
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
        $directores = [];
        switch($role){
            case 'admin':
                $directores = UserDate::where('name', 'LIKE', "%$search%")
                                ->whereHas('user', function ($query) {
                                    $query->whereHas('roles', function ($query) {
                                        $query->where('name', 'school-principal');
                                    });
                                })
                                ->get();
                break;
            case 'admregional':
                $directores = UserDate::where('name', 'LIKE', "%$search%")
                                ->where('regional_id', $user->userDate->regional_id)
                                ->whereHas('user', function ($query) {
                                    $query->whereHas('roles', function ($query) {
                                        $query->where('name', 'school-principal');
                                    });
                                })
                                ->get(); 
                break;
            default:
                $directores = [];
        }
    
        return view('users.directores.director', compact('directores'));
    }

    public function directorbysearch(Request $request) 
    {
        $validated = $request->validate([
            'query' => 'required|string',
        ]);
        $search = $request->get('query'); 
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
        $directores = [];
        switch($role){
            case 'admin':
                $directores = UserDate::whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'LIKE', "%$search%");
                            })
                            ->whereHas('user', function ($query) {
                                $query->whereHas('roles', function ($query) {
                                    $query->where('name', 'school-principa');
                                });
                            })
                            ->get();
                break;
            case 'admregional':
                $directores = UserDate::whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'LIKE', "%$search%");
                            })
                            ->whereHas('user', function ($query) {
                                $query->whereHas('roles', function ($query) {
                                    $query->where('name', 'school-principa');
                                });
                            })
                            ->where('regional_id', $user->userDate->regional_id)
                            ->get();
                break;
            default:
                $directores = [];

        }
        return view('users.directores.directorbysearch', compact('directores'));
    }

    public function teacherSearch() 
    {
        $teachers = [];

        return view('users.teachers.teacher', compact('teachers'));
    }

    public function teacher(Request $request) 
    {
        $validated = $request->validate([
            'query' => 'required|string',
        ]);
        $search = $request->get('query'); 
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
        $teachers = [];
        switch($role){
            case 'admin':
                $teachers = UserDate::where('name', 'LIKE', "%$search%")
                                ->whereHas('user', function($query){
                                    $query->whereHas('roles', function ($query) {
                                        $query->where('name', 'teacher');
                                    });
                                })
                                ->get();
                break;
            case 'admregional':
                $teachers = UserDate::where('name', 'LIKE', "%$search%")
                                ->where('regional_id', $user->userDate->regional_id)
                                ->whereHas('user', function($query){
                                    $query->whereHas('roles', function ($query) {
                                        $query->where('name', 'teacher');
                                    });
                                })
                                ->get();
                break;
            default:
                $teachers = [];

        }
        return view('users.teachers.teacher', compact('teachers'));
    }

    public function teacherbysearch(Request $request) 
    {
        $validated = $request->validate([
            'query' => 'required|string',
        ]);
        $search = $request->get('query'); 
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
        $teachers = [];
        switch($role){
            case 'admin':
                $teachers = UserDate::whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'LIKE', "%$search%");
                            })
                            ->whereHas('user', function ($query) {
                                $query->whereHas('roles', function ($query) {
                                    $query->where('name', 'teacher');
                                });
                            })
                            ->get();
                break;
            case 'admregional':
                $teachers = UserDate::whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'LIKE', "%$search%");
                            })
                            ->whereHas('user', function ($query) {
                                $query->whereHas('roles', function ($query) {
                                    $query->where('name', 'teacher');
                                });
                            })
                            ->where('regional_id', $user->userDate->regional_id)
                            ->get();
                break;
            default:
                $teachers = [];

        }
        return view('users.teachers.teacherbysearch', compact('teachers'));
    }

    public function studentSearch() 
    {
        $students = [];

        return view('users.students.student', compact('students'));
    }

    public function student(Request $request) 
    {
        $validated = $request->validate([
            'query' => 'required|string',
        ]);
        $search = $request->get('query'); 
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
       $students = [];
        switch($role){
            case 'admin':
                $students = UserDate::where('name', 'LIKE', "%$search%")
                                ->whereHas('user', function ($query) {
                                    $query->whereHas('roles', function ($query) {
                                        $query->where('name', 'student');
                                    });
                                })
                                ->get();
                break;
            case 'admregional':
                $students = UserDate::where('name', 'LIKE', "%$search%")
                                ->where('regional_id', $user->userDate->regional_id)
                                ->whereHas('user', function ($query) {
                                    $query->whereHas('roles', function ($query) {
                                        $query->where('name', 'student');
                                    });
                                })
                                ->get();
                break;
            default:
               $students = [];

        }
        return view('users.students.student', compact('students'));
    }

    public function studentbysearch(Request $request) 
    {
        $validated = $request->validate([
            'query' => 'required|string',
        ]);
        $search = $request->get('query'); 
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
        $students = [];
        switch($role){
            case 'admin':
                $students = UserDate::whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'LIKE', "%$search%");
                            })
                            ->whereHas('user', function ($query) {
                                $query->whereHas('roles', function ($query) {
                                    $query->where('name', 'student');
                                });
                            })
                            ->get();
                break;
            case 'admregional':
                $students = UserDate::whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'LIKE', "%$search%");
                            })
                            ->whereHas('user', function ($query) {
                                $query->whereHas('roles', function ($query) {
                                    $query->where('name', 'student');
                                });
                            })
                            ->where('regional_id', $user->userDate->regional_id)
                            ->get();
                break;
            default:
                $students = [];

        }
        return view('users.students.studentbysearch', compact('students'));
    }

    public function createuser() 
    {
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
        $roles = [];
        switch ($role) {
            case 'admin':
                $roles =  Role::whereNotIn('name', ['teacher', 'student', 'school-principal', 'super-admin'])
                            ->get();
                break;
            case 'admregional':
                $roles = Role::whereNotIn('name', ['teacher', 'student', 'school-principal', 'admin', 'admregional', 'super-admin'])
                        ->get();
                break;
            default:
                return back();
        }

        return view('users.create-user-by-roles', compact('roles'));
    }

    public function create($id) 
    {
        $role = Role::find($id);
        $regionals =  Regional::all();
  
        return view('users.create', compact('regionals', 'role'));
    }

    public function store(Request $request, $id)
    {
        $role = Role::find($id);
        $userId = User::find(Auth()->id());
        $roleName = $userId->getRoleNames()[0];

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make('password');
        $user->enable = true;
        $user->save();

        $user->assignRole($role->name);

        $userDate = new UserDate();

        if ($roleName == 'admregional') {
            $userDate->regional_id = $userId->userDate->regional_id;
        }else {
            $userDate->regional_id = $request->regional_id;
        }

        $userDate->name = $request->name;
        $userDate->first_lastname = $request->first_lastname;
        $userDate->second_lastname = $request->second_lastname;
        $userDate->nro_ci = $request->nro_ci;
        $userDate->issued = $request->issued;
        $userDate->nit = $request->nit;
        $userDate->birthday_date = $request->birthday_date;
        $userDate->city = $request->city;
        $userDate->addres = $request->addres;
        $userDate->landline = $request->landline;
        $userDate->cell_personal = $request->cell_personal;
        $userDate->cell_work = $request->cell_work;
        $userDate->email_personal = $request->email_personal;
        $userDate->code_sap = $request->code_sap;
        $userDate->code_employee_sap = $request->code_employee_sap;
        $userDate->code_teacher = $request->code_teacher;
        $userDate->change_password = $request->change_password;
        $userDate->rate_hoguera = $request->rate_hoguera;
        $userDate->rate_alpema = $request->rate_alpema;
        $userDate->verify_data = $request->verify_data;
        $userDate->pos_hoguera_id = $request->pos_hoguera_id;

        $user->userDate()->save($userDate);
        $messages = 'El usuario se registro correctamente';
        return back()->with(compact('messages'));
    }

    public function changePassword()
    {
        return view('users.change-password');
    }

    public function saveChangePassword(Request $request) 
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

        $userData = $user->userDate;
        $userData->change_password = true;
        $userData->save();

        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    public function verifyData() 
    {
        $cities = Regional::select('id', 'name')->get();
        $issueds = [
                    'BE','SCZ', 'CB','CH','TJ','LP','OR','PT',
                ];

        return view('users.verify-data', compact('cities', 'issueds'));
    }

    public function saveVerifyData(Request $request) 
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
        $userDate->verify_data = true;

        $userDate->save();

        $messages = 'Los datos fueron guardados correctamente';
        return redirect('/home')->with(compact('messages'));
        
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(StoreUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->email = $user->email;
        $user->save();

        $userDate = $user->userDate;
        $userDate->regional_id = $user->userDate->regional_id;
        $userDate->name = $request->name;
        $userDate->first_lastname = $request->first_lastname;
        $userDate->second_lastname = $request->second_lastname;
        $userDate->nro_ci = $request->nro_ci;
        $userDate->issued = $request->issued;
        $userDate->nit = $request->nit;
        $userDate->birthday_date = $request->birthday_date;
        $userDate->city = $request->city;
        $userDate->addres = $request->addres;
        $userDate->landline = $request->landline;
        $userDate->cell_personal = $request->cell_personal;
        $userDate->cell_work = $request->cell_work;
        $userDate->email_personal = $request->email_personal;
        $userDate->code_sap = $request->code_sap;
        $userDate->code_employee_sap = $request->code_employee_sap;
        $userDate->code_teacher = $request->code_teacher;
        $userDate->change_password = $request->change_password;
        $userDate->rate_hoguera = $request->rate_hoguera;
        $userDate->rate_alpema = $request->rate_alpema;
        $userDate->verify_data = $request->verify_data;
        $userDate->pos_hoguera_id = $request->pos_hoguera_id;
        $userDate->save();
      

        $messages = 'Se actualizaron los datos correctamente.';
        return back()->with(compact('messages'));
    }

    public function destroy($id)
    {
        $user = User::find($id)->userDate;
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
