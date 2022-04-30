<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;

Route::get('',[HomeController::class,'index'])->name('admin.home');

Route::get('users',[UserController::class,'index'])->name('admin.users');