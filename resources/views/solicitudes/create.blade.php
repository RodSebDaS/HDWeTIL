@extends('adminlte::page')

@section('title', 'Solicitudes | Crear')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="row justify-content-center py-3">
        <div class="col-md-11">
            <a href="{{ route('solicitudes.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
            </a>
            <h1>Nueva Solicitud</h1>
        </div>
    </div>
@stop

@section('content')
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
                        @livewire('solicitudes.solicitudes-create')
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')  
@stop
