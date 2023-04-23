@extends('adminlte::page')

@section('title', 'Usuarios | Editar')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="row justify-content-right py-3">
        <div class="col-md-12">
            <a href="{{ route('admin.users.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
            </a>
            <h1>Editar Usuario</h1>
        </div>
    </div>
@stop

@section('content')
    {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card card-secondary card-outline col-md-12">
                    <div class="card-header">
                        <h6 class="card-title"><strong><i class="far fa-file-alt"></i> Datos:</strong></h6>
                        <div class="card-tools">
                            <!-- Collapse Button -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                        <!-- /.card-header -->
                    <div class="card-body">
                        <p class="text-justify">
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
                                        </div>
                                    </div>
                                </div>
                            </body>
                        </p>
                    </div>
                    <!-- /.card-body -->
                    <hr>
                    <div class="mt-2">
                        {!! Form::button('<i class="fa fa-save"><text class="font-weight-normal"> Asignar</text></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm float-right mt-2']) !!}
                            <p><i class="text-danger">(*)</i>Campos requeridos</p>
                            <br>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    {!! Form::close() !!}
@stop

@section('css')
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
