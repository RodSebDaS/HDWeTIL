<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activo;
use App\Models\Servicio;
use App\Models\User;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class HomeController extends Controller
{
    public function index(){

        $user = User::find((Auth::User()->id));
    
        if ( session()->previousUrl() == "http://127.0.0.1:8000") {
            if ($user->hasRole('Admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('Alumno')) {
                return view('admin.home.index');
            } elseif ($user->hasRole('Mesa de Ayuda')) {
                return redirect()->route('solicitudes.index');
            } elseif ($user->hasRole('Soporte Técnico')) {
                return redirect()->route('posts.asignadas');
            } elseif ($user->hasRole('Especialista')) {
                return redirect()->route('posts.asignadas');
            }
        } else {
            return view('admin.home.index');
        }
    }

    public function dashboard(){
    
        return view('admin.dashboard');
    }
}
