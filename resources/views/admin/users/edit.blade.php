@extends('adminlte::page')

@section('title', 'Usuarios | Editar')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

    <body>
        <div class="container py-2">
            <div class="card">
                <div class="card-body">
                    <p class="h5">Nombre:</p>
                    <p class="form-control">{{ $user->name }}</p>

                    <div class="container py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="h5">Listado de Roles</h2>
                                        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                                        @foreach ($roles as $role)
                                            <div>
                                                <label>
                                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                                    {{ $role->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <h2 class="h5">Lista de Equipos de Actuación</h2>
                                        @foreach ($teams as $team)
                                            <div>
                                                <label>
                                                    {!! Form::radio($team->id, $team->name, false) !!}
                                                    {{ $team->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </body>
@stop

@section('css')
@stop

@section('js')>
@stop
