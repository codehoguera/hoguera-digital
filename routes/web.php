<?php


use App\Http\Controllers\RegionalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDateController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
                
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/createuser', [UserController::class, 'createuser'])->name('users.create-user-by-roles');
Route::get('/createuser/createtypeuser/{id}', [UserController::class, 'create'])->name('users.create');
Route::post('/createuser/createtypeuser/{id}', [UserController::class, 'store'])->name('users.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/user/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/change_password', [UserController::class, 'changePassword'])->name('users.change-password')->missing(fn() => Redirect::route('home', null, 301));
Route::patch('/save_password', [UserController::class, 'saveChangePassword']);
Route::get('/verify_data', [UserController::class, 'verifyData'])->name('users.verify-data');
Route::post('/save_data', [UserController::class, 'saveVerifyData']);

//director
Route::get('/director', [UserController::class, 'indexDirector'])->name('users.directores.director');
Route::post('/director', [UserController::class, 'director'])->name('users.directores.director');
Route::post('/directorbyschool', [UserController::class, 'directorbysearch'])->name('users.directores.directorbysearch');

//teacher
Route::get('/teacher', [UserController::class, 'indexTeacher'])->name('users.teachers.teacher');
Route::post('/teacher', [UserController::class, 'teacher'])->name('users.teachers.teacher');
Route::post('/teacherbyschool', [UserController::class, 'teacherbysearch'])->name('users.teachers.teacherbysearch');

//student
Route::get('/student', [UserController::class, 'indexStudent'])->name('users.students.student');
Route::post('/student', [UserController::class, 'student'])->name('users.students.studenstudent');
Route::post('/studentbyschool', [UserController::class, 'studentbysearch'])->name('users.students.studentbysearch');

Route::get('/regionals', [RegionalController::class, 'index'])->name('regionals.index');
Route::get('/userdates', [UserDateController::class, 'index'])->name('userdates.index');

Route::get('/hoguera', [EntityController::class, 'index'])->name('entities.index');
Route::get('/alpema', [EntityController::class, 'alpema'])->name('entities.alpema');

Route::get('/{request}',  [UserController::class, 'request404']);
