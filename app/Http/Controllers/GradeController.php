<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_grade' => 'required|string|max:50',   
            'cycle' => 'required|string|max:50',
            'cover' => 'required|string|max:200',
        ]);

        if($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $grades = new Grade();
        $grades->name_grade = $request->name_grade;
        $grades->cycle = $request->cycle;
        $grades->cover = $request->cover;
        $grades->save();

        $notification = 'Los Datos se guardaron correctamente';
        return redirect()->route('grades.index')->with(compact('notification'));

    }

    public function edit($id) 
    {
        $grade = Grade::findOrFail($id);
        
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, $id) 
    {
        $validator = Validator::make($request->all(), [
            'name_grade' => 'required|string|max:50',   
            'cycle' => 'required|string|max:50',
            'cover' => 'required|string|max:200',
        ]);

        if($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $grade = Grade::findOrFail($id);
        $grade->name_grade = $request->name_grade;
        $grade->cycle = $request->cycle;
        $grade->cover = $request->cover;
        $grade->save();

        $notification = 'Los datos se actualizaron correctamente';
        return redirect()->route('grades.index')->with(compact('notification'));
    }
}
