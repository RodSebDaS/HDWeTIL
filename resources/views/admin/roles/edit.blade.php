@extends('adminlte::page')

@section('title', 'Roles | Editar')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="row justify-content-right py-2">
        <div class="col-md-12">
            <a href="{{ route('admin.roles.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
            </a>
            <h1>Editar Rol</h1>
        </div>
    </div>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
           {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
               
                @include('admin.roles.partials.form')

                {!! Form::submit('Modificar Rol', ['class' => 'btn btn-primary mt-2']) !!}
           {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script>
        @if (session('info'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<h4>{{session('info')}}</h4>',
                showConfirmButton: false,
                type: "success",
                timer: 3500
            })
        @endif
    </script>
@stop