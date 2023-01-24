<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activo;
use App\Models\Servicio;
use App\Models\User;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    public function index(){
    
        return view('admin.home.index');
    }

    public function dashboard(){
    
        return view('admin.dashboard');
    }
}
