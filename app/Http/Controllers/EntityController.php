<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use App\Models\User;
use App\Models\UserDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');
    }

    public function index()
    {
        $this->authorize('viewAny', User::class);
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
        $search = 'S';
        $users = [];
        switch ($role) {
            case 'admin':
                $users = UserDate::with('entities', 'regional')
                            ->whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'like', "%$search%");
                            })
                            ->whereHas('regional', function ($query) {
                                $query->select('name');
                            })
                            ->select('id', 'regional_id', 'name',)
                            ->get();
                break;
            case 'admregional':
                $users = UserDate::with('entities', 'regional')
                            ->whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'like', "%$search%");
                            })
                            ->whereHas('regional', function ($query) {
                                $query->select('name');
                            })
                            ->where('regional_id', $user->userDate->regional_id)
                            ->select('id', 'regional_id', 'name')
                            ->get();
                break;

            default:
                return back();
        }
        
        return view('entities.index', compact('users'));

    }

    public function alpema() 
    {
        $this->authorize('viewAny', User::class);
        $user = User::find(Auth()->id());
        $role = $user->getRoleNames()[0];
        $search = 'S';
        $users = [];
        switch ($role) {
            case 'admin':
                $users = UserDate::with('entities', 'regional')
                            ->whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'like', "%$search%");
                            })
                            ->whereHas('regional', function ($query) {
                                $query->select('name');
                            })
                            ->select('id', 'regional_id', 'name',)
                            ->get();
                break;
            case 'admregional':
                $users = UserDate::with('entities', 'regional')
                            ->whereHas('entities', function ($query) use ($search) {
                                $query->where('name_entity', 'like', "%$search%");
                            })
                            ->whereHas('regional', function ($query) use ($user) {
                                $query->where('id', $user->regional_id);
                            })
                            ->where('regional_id', $user->userDate->regional_id)
                            ->select('id', 'regional_id', 'name')
                            ->get();
                break;

            default:
                $users = back();
        }
        
        return view('entities.alpema', compact('users'));
    }
    
}
