<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use App\Models\User;
use App\Models\UserDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('change_password');
        $this->middleware('verify_data');
    }

    public function index() 
    {
        return view('home');
    }

}
