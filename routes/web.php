<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDateController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user', [UserController::class, 'store'])->name('users.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('edit');
Route::patch('/user/{id}', [UserController::class, 'update'])->name('update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('destroy');

//soft delete
Route::get('/user/restore/{id}', [UserController::class, 'restore'])->name('restore');
Route::get('user/restore-all', [UserController::class, 'restoreAll'])->name('restoreAll');

Route::get('/regionals', [RegionalController::class, 'index'])->name('regionals.index');
Route::get('/userdates', [UserDateController::class, 'index'])->name('userdates.index');

//login google
Route::get('/login-google', [GoogleController::class, 'googleRedirect'])->name('auth.login');
Route::get('/google-callback', [GoogleController::class, 'googleCallback'])->name('auth.login');

//login facebook
Route::get('/login-facebook', [FacebookController::class, 'facebookRedirect'])->name('auth.login');
Route::get('/facebook-callback', [FacebookController::class, 'facebookCallback'])->name('auth.login');
    