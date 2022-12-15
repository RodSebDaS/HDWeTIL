@extends('adminlte::page')

@section('title', 'Roles | Editar')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
           {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
               
                @include('admin.roles.partials.form')

                {!! Form::submit('Modificar Rol', ['class' => 'btn btn-primary']) !!}
           {!! Form::close() !!}
        </div>
    </div>
@stop
