<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;
use App\Models\UserDate;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
        
    }

    public function create() 
    {
        return view('grades.create');
    }

    public function store()
    {
        
    }

    public function edit($id) 
    {
        $grade = Grade::findOrFail($id);
        
        return view('grades.edit', compact('grade'));
    }

    public function update() 
    {

    }
}
