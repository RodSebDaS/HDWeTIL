<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SolicitudController;
use App\Http\Controllers\Admin\DatatableController;

Route::get('', [HomeController::class, 'index',])->name('admin.home');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('solicitudes', SolicitudController::class)->names('admin.solicitudes');
Route::get('datatable/solicitudes', [DatatableController::class, 'solicitud',])->name('datatable.solicitud');