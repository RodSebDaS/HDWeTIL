@extends('adminlte::page')

@section('title', 'Solicitudes | Crear')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <a href="{{ route('admin.solicitudes.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
            </a>
            <h1>Nueva Solicitud</h1>
        </div>
    </div>
@stop

@section('content')


    <form class="form-group" method="POST" action="/home/solicitudes" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card col-md-11">
                    <div class="card-body">
                        @livewire('admin.form-post')
                        {{-- @livewire('admin.editor') --}}
                        <div class="mt-2">
                            <x-adminlte-button theme="success" label="Enviar" type="submit" class="btn bnt float-right" />
                        </div>
                        <p><i class="text-danger">(*)</i>Campos requeridos</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
