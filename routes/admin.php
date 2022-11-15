<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Modulo\SolicitudController;
use App\Http\Controllers\Modulo\PostController;
use App\Http\Controllers\Modulo\PostsController;
use App\Http\Controllers\Componente\ComentarioController;
use App\Http\Controllers\Componente\DatatableController;
use App\Http\Controllers\Componente\ImageController;
use App\Http\Controllers\Componente\PdfController;
use App\Http\Controllers\Modulo\AccionController;
use App\Http\Livewire\Posts\Stepper;
use App\Models\User;

//inicio
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');
//Módulo Usuario
Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.users');
Route::get('datatable/users', [DatatableController::class, 'users'])->name('datatable.users');
//Módulo Roles
Route::resource('roles', RoleController::class)->names('admin.roles');
//Módulo Solicitudes
Route::resource('solicitudes', SolicitudController::class)->names('solicitudes');
Route::get('datatable/solicitudes', [DatatableController::class, 'solicitudes'])->name('datatable.solicitudes');
//Módulo Posts -
Route::resource('post', PostController::class)->names('posts');
Route::get('posts/atendidas', [PostsController::class, 'index'])->name('posts.atendidas');
Route::get('posts/asignadas', [PostsController::class, 'index'])->name('posts.asignadas');
Route::get('posts/derivadas', [PostsController::class, 'index'])->name('posts.derivadas');
Route::get('posts/{post}/atender', [PostsController::class, 'atender'])->name('posts.atender');
Route::get('posts/{post}/derivar', [PostsController::class, 'derivar'])->name('posts.derivar');
Route::get('posts/{post}/cerrar', [PostsController::class, 'cerrar'])->name('posts.cerrar');
Route::get('posts/{post}/rechazar', [PostsController::class, 'rechazar'])->name('posts.rechazar');
Route::get('datatable/posts', [DatatableController::class, 'posts'])->name('datatable.posts');

//Componentes
//Route::get('datatable/filtros', [DatatableController::class, 'filtro',])->name('datatable.filtro');
//Comentarios
Route::resource('comentarios', ComentarioController::class)->names('comentarios');
//Imágenes
Route::post('images/upload', [ImageController::class, 'upload'])->name('image.upload');
//Pdf
Route::get('userspdf', [PdfController::class, 'user'])->name('user.pdf');
