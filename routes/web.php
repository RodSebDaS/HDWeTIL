<?php


use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Mail\MensajesMailable;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/home', function () {
        return view('admin.index');
    })->name('admin.home');
});
 */

Route::get('mensajes',function(){
    $correo = new MensajesMailable;
    Mail::to('rsddasilva@gmail.com')->send($correo);
    return "Mensaje Enviado";
 });