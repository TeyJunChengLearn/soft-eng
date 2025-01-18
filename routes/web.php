<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterfaceUseController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class,'index']);
Route::get('/design', [InterfaceUseController::class,'index']);

