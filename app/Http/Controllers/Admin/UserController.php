<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update', 'destroy');
    }
    
    public function index()
    {   
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
       //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $teams = Team::all();
       //($teams);
        return view('admin.users.edit', compact('user','roles','teams'));
    }

    public function update(Request $request, User $user)
    {
        $roles = $request->roles;
        if ($roles !== null) {
            $primerRol = reset($roles);
            $rol = Role::where('id','=', $primerRol)->get()->pluck('name');
            $user->current_rol = $rol[0]??null;
        }
        $user->save();
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit', $user)->with('info','Se asignó correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('info', 'Usuario eliminado con éxito!');
    }
}