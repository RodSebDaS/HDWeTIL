@extends('adminlte::page')

@section('title', 'Activos | Editar')

@section('plugins.Select2', true)
@section('plugins.DateRangePicker', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)

@section('content_header')
    <div class="row justify-content-right py-3">
        <div class="col-md-12">
            <a href="{{ route('activos.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
            </a>
            <h1>Editar Activos</h1>
        </div>
    </div>
@stop

@section('content')
    <form wire:submit.prevent="save" class="form-group" method="POST" action="/home/activos/{{ $activo->id }}" enctype="multipart/form-data">
        @method('PUT')
     {{--    <div>
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body clearfix">
                        @livewire('activos.form-activo', ['activo' => $activo])
                        <div class="mt-4">
                            <x-adminlte-button theme="primary" label="Guardar" type="submit" icon="fas fa-save"
                                class="btn btn-sm float-right" />
                        </div>
                    </div>
                    <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
                </div>
            </div>
        </div> --}}
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
                            @livewire('activos.form-activo', ['activo' => $activo,'accion' => 'Edit'])
                        </p>
                    </div>
                    <!-- /.card-body -->
                    <hr>
                    <div class="mt-0">
                        <x-adminlte-button theme="success" label="Guardar" type="submit" class="btn btn-sm float-right btn-sm"
                            icon="fas fa-save" />
                            <p><i class="text-danger">(*)</i> Campos requeridos</p>
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
