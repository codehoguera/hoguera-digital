<?php


use App\Http\Controllers\RegionalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDateController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

//
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::patch('/', [HomeController::class, 'passwordConfirmed'])->name('home')->middleware('status');
Route::get('/home', [HomeController::class, 'create'])->name('create')->middleware('status');
Route::post('/home', [HomeController::class, 'store'])->name('create.store');


require_once __DIR__ . '/fortify.php';

//users
Route::get('/users', [UserController::class, 'index'])->name('users.index');

//director
Route::get('/director', [UserController::class, 'directorSearch'])->name('users.directores.director');
Route::post('/director', [UserController::class, 'director'])->name('users.directores.director');
Route::post('/directorbyschool', [UserController::class, 'directorbysearch'])->name('users.directores.directorbysearch');

//teacher
Route::get('/teacher', [UserController::class, 'teacherSearch'])->name('users.teachers.teacher');
Route::post('/teacher', [UserController::class, 'teacher'])->name('users.teachers.teacher');
Route::post('/teacherbyschool', [UserController::class, 'teacherbysearch'])->name('users.teachers.teacherbysearch');

//student
Route::get('/student', [UserController::class, 'studentSearch'])->name('users.students.student');
Route::post('/student', [UserController::class, 'student'])->name('users.students.studenstudent');
Route::post('/studentbyschool', [UserController::class, 'studentbysearch'])->name('users.students.studentbysearch');

//create user
Route::get('/createuser', [UserController::class, 'createuser'])->name('users.create-user-by-roles');
Route::get('/createuser/createtypeuser/{id}', [UserController::class, 'create'])->name('users.create');
Route::post('/createuser/createtypeuser/{id}', [UserController::class, 'store'])->name('users.store');


Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/user/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');

//soft delete
Route::get('/user/restore/{id}', [UserController::class, 'restore'])->name('restore');
Route::get('user/restore-all', [UserController::class, 'restoreAll'])->name('restoreAll');

Route::get('/regionals', [RegionalController::class, 'index'])->name('regionals.index');
Route::get('/userdates', [UserDateController::class, 'index'])->name('userdates.index');

// //login google
// Route::get('/login-google', [GoogleController::class, 'googleRedirect'])->name('auth.login');
// Route::get('/google-callback', [GoogleController::class, 'googleCallback'])->name('auth.login');

// //login facebook
// Route::get('/login-facebook', [FacebookController::class, 'facebookRedirect'])->name('auth.login');
// Route::get('/facebook-callback', [FacebookController::class, 'facebookCallback'])->name('auth.login');

//entities
Route::get('/hoguera', [EntityController::class, 'index'])->name('entities.index');
Route::get('/alpema', [EntityController::class, 'alpema'])->name('entities.alpema');

Route::view('user/password', 'users.password');
    