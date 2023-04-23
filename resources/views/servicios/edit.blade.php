@extends('adminlte::page')

@section('title', 'Servicios | Editar')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)

@section('content_header')
    <div class="row justify-content-right py-3">
        <div class="col-md-12">
            <a href="{{ route('servicios.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
            </a>
            <h1>Editar Servicios</h1>
        </div>
    </div>
@stop

@section('content')
    <form class="form-group" method="POST" action="/home/servicios/{{ $servicio->id }}" enctype="multipart/form-data">
        @method('PUT')
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
                            @livewire('servicios.form-servicio', ['servicio' => $servicio, 'accion' => 'Edit'])
                        </p>
                    </div>
                    <!-- /.card-body -->
                    <hr>
                    <div class="mt-2">
                        <x-adminlte-button theme="success" label="Guardar" type="submit" class="btn btn-sm float-right"
                            icon="fas fa-save" />
                            <p><i class="text-danger">(*)</i>Campos requeridos</p>
                            <br>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </form>
@stop

@section('css')

@stop

@section('js')

@stop
