<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ComentarioController;
use App\Http\Controllers\Admin\DatatableController;
use App\Http\Controllers\ImageController;

Route::get('', [HomeController::class, 'index',])->name('admin.home');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('solicitudes', PostController::class)->names('admin.solicitudes');
Route::get('datatable/solicitudes', [DatatableController::class, 'solicitud',])->name('datatable.solicitud');
Route::resource('comentarios', ComentarioController::class)->names('admin.comentarios');
Route::post('images/upload', [ImageController::class, 'upload'])->name('image.upload');