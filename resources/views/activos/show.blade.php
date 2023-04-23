@extends('adminlte::page')

@section('title', 'Activos | Show')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Stepper', true)
@section('plugins.BootstrapSelect', true)

@section('content_header')
    <div class="row justify-content-center py-3">
        <div class="col-md-11">
            <a href="{{ route('activos.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
            </a>
            <h1>Activo</h1>
        </div>
    </div>
@stop

@section('content')
 {{--    <div>
        <div class="row justify-content-center">
            <div class="card col-md-11">
                <div class="card-body clearfix">
                    @livewire('activos.form-activo', ['activo' => $activo, 'accion' => 'Show'])
                    <div class="mt-2">
                        <a href="{{ "/home/activos/$activo->id/edit" }}">
                            <x-button class="mr-auto float-right btn-sm" type="submit" theme="secondary" label="Editar"
                                icon="fas fa-pen" />
                        </a>
                    </div>
                </div>
                <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card card-secondary card-outline col-md-11">
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
                        @livewire('activos.form-activo', ['activo' => $activo, 'accion' => 'Show'])
                    </p>
                </div>
                <!-- /.card-body -->
                <hr>
                <div class="mt-0">
                    <a href="{{ "/home/activos/$activo->id/edit" }}">
                        <x-button class="mr-auto float-right btn-sm" type="submit" theme="secondary" label="Editar"
                            icon="fas fa-pen" />
                    </a>
                    <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
