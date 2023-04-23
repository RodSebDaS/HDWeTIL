@extends('adminlte::page')

@section('title', 'Roles | Crear')

@section('content_header')
    <div class="row justify-content-center py-3">
        <div class="col-md-12">
            <a href="{{ route('admin.roles.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
            </a>
            <h1>Nuevo Rol</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
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
                                    @include('admin.roles.partials.form')
                                </p>
                            </div>
                            <!-- /.card-body -->
                            <hr>
                            <div class="mt-2">
                                {!! Form::button('<i class="fa fa-save"><text class="font-weight-normal"> Guardar</text></i>', ['type' => 'submit', 'class' => 'btn btn-sm float-right btn-success']) !!}
                                    <p><i class="text-danger">(*)</i>Campos requeridos</p>
                                    <br>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                
            {!! Form::close() !!}
        </div>
    </div>
@stop