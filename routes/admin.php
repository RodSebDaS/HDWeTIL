<?php

use App\Http\Controllers\Admin\AuditoriaController;
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
use App\Http\Controllers\Componente\HistorialController;
use App\Http\Controllers\Componente\ImageController;
use App\Http\Controllers\Componente\MensajeController;
use App\Http\Controllers\Componente\PdfController;
use App\Http\Controllers\Componente\TareaController;
use App\Http\Controllers\Modulo\AccionController;
use App\Http\Controllers\Modulo\ActivoController;
use App\Http\Controllers\Modulo\EstadisticaController;
use App\Http\Controllers\Modulo\ServicioController;
use App\Http\Livewire\Posts\Stepper;
use App\Models\User;
use App\Mail\MensajesMailable;
use Illuminate\Support\Facades\Mail;

//Home
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');
//Dashboard
Route::get('dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
//Módulo Usuario
Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.users');
Route::get('datatable/users', [DatatableController::class, 'users'])->name('datatable.users');
//Módulo Roles
Route::resource('roles', RoleController::class)->names('admin.roles');
//Módulo Solicitudes
Route::resource('solicitudes', SolicitudController::class)->names('solicitudes');
Route::get('datatable/solicitudes', [DatatableController::class, 'solicitudes'])->name('datatable.solicitudes');
//Módulo Posts
Route::resource('post', PostController::class)->names('posts');
Route::get('posts/atendidas', [PostsController::class, 'index'])->name('posts.atendidas');
Route::get('posts/asignadas', [PostsController::class, 'index'])->name('posts.asignadas');
Route::get('posts/derivadas', [PostsController::class, 'index'])->name('posts.derivadas');
Route::get('posts/{post}/atender', [PostsController::class, 'atender'])->name('posts.atender');
Route::get('posts/{post}/derivar', [PostsController::class, 'derivar'])->name('posts.derivar');
Route::get('posts/{post}/cerrar', [PostsController::class, 'cerrar'])->name('posts.cerrar');
Route::get('posts/{post}/rechazar', [PostsController::class, 'rechazar'])->name('posts.rechazar');
Route::get('posts/{post}/respuesta', [PostsController::class, 'respuesta'])->name('posts.respuesta');
Route::get('posts/buscar', [PostsController::class, 'buscar'])->name('posts.buscar');
Route::get('datatable/posts', [DatatableController::class, 'posts'])->name('datatable.posts');
Route::get('historial/{post}', [HistorialController::class, 'show'])->name('historial.show');
Route::get('posts/pendientes', [PostsController::class, 'index'])->name('posts.pendientes');
//Route::get('datatable/posts/pendientes', [DatatableController::class, 'pendientes'])->name('datatable.posts_pendientes');
Route::get('posts/cerradas', [PostsController::class, 'index'])->name('posts.cerradas');
//Route::get('datatable/posts/cerradas', [DatatableController::class, 'cerradas'])->name('datatable.cerradas');
//Route::get('datatable/posts/all', [DatatableController::class, 'posts'])->name('datatable.posts_all');
Route::get('posts/otros', [PostController::class, 'index'])->name('posts.otros');
//Route::get('datatable/posts/otros', [DatatableController::class, 'otros'])->name('datatable.posts_otros');

//Módulo Activos
Route::resource('activos', ActivoController::class)->names('activos');
Route::get('datatable/activos', [DatatableController::class, 'activos'])->name('datatable.activos');
//Módulo Servicios
Route::resource('servicios', ServicioController::class)->names('servicios');
Route::get('datatable/servicios', [DatatableController::class, 'servicios'])->name('datatable.servicios');
//Módulo Auditoria
Route::resource('auditorias', AuditoriaController::class)->only(['index', 'show'])->names('auditorias');
Route::get('datatable/auditorias', [DatatableController::class, 'auditorias'])->name('datatable.auditorias');
//Módulo Estadísticas
//Route::get('estadisticas', [EstadisticaController::class,'index'])->name('estadisticas.index');
//Route::get('estadisticas/usuarios', [EstadisticaController::class,'usuarios'])->name('estadisticas.usuarios');
//Route::get('estadisticas/posts', [EstadisticaController::class,'posts'])->name('estadisticas.posts');

//Componentes
//Route::get('datatable/filtros', [DatatableController::class, 'filtro',])->name('datatable.filtro');
//Comentarios
Route::resource('comentarios', ComentarioController::class)->names('comentarios');
//Imágenes
Route::post('images/upload', [ImageController::class, 'upload'])->name('image.upload');
//Pdf
Route::get('userspdf', [PdfController::class, 'user'])->name('user.pdf');
//Mensajes
Route::get('mensajes/{post}', [MensajeController::class, 'store'])->name('mensajes');

//Tareas
Route::resource('tareas', TareaController::class)->names('tareas');

