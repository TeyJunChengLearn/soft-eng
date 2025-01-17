<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
Route::get('/', function () {
    return view('welcome');
})->middleware(Admin::class);
