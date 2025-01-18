<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SelectRoleController;
use App\Http\Controllers\InterfaceUseController;


Route::get('/design', [InterfaceUseController::class,'index']);

Route::get('/', [LoginController::class,'index'])->name('landing.index');
Route::post('/login', [LoginController::class,'login'])->name('login.post');

Route::get('/register',[RegisterController::class,'index'])->name('register.index');
Route::post('/register',[RegisterController::class,'register'])->name('register.post');

// Route::middleware(['guest'])->group(function () {
//     Route::get('/', [LoginController::class,'index'])->name('landing.index');
//     Route::post('/login', [LoginController::class,'login'])->name('login.post');
//     Route::get('/register',[RegisterController::class,'index'])->name('register.index');
//     Route::post('/register',[RegisterController::class,'register'])->name('register.post');

// });


Route::get('/selectRole',[SelectRoleController::class,'index'])->name('selectRole.index');
Route::get('/selectRole/manager',[SelectRoleController::class,'manager'])->name('selectRole.manager');
Route::get('/selectRole/medicalStaff',[SelectRoleController::class,'medicalStaff'])->name('selectRole.medicalStaff');
Route::get('/selectRole/caretaker',[SelectRoleController::class,'caretaker'])->name('selectRole.caretaker');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/selectRole',[SelectRoleController::class,'index'])->name('selectRole.index');
//     Route::get('/selectRole/manager',[SelectRoleController::class,'manager'])->name('selectRole.manager');
//     Route::get('/selectRole/medicalStaff',[SelectRoleController::class,'medicalStaff'])->name('selectRole.medicalStaff');
//     Route::get('/selectRole/caretaker',[SelectRoleController::class,'caretaker'])->name('selectRole.caretaker');
// });



