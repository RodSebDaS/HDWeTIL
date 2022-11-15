<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
         $this->middleware('can:admin.roles.index')->only('index');
         $this->middleware('can:admin.roles.edit')->only('show','edit','update');
        // $this->middleware('can:admin.roles.create')->only('create');
        // $this->middleware('can:admin.roles.store')->only('store');
        // $this->middleware('can:admin.roles.destroy')->only('destroy');
    }
    
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $levels =  Level::pluck('nombre','id');
        return view('admin.roles.create', compact('permissions', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        
        return redirect()->route('admin.roles.index')->with('info', 'Rol creado con éxito!');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $levels = Level::pluck('nombre','id');
        return view('admin.roles.edit', compact('role','permissions','levels'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate(['name' => 'required']);
        $role->level =  $request->get('level');
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.edit', $role)->with('info', 'Rol actualizado con éxito!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('info', 'Rol eliminado con éxito!');
    }
}
