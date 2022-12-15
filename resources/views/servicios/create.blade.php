@extends('adminlte::page')

@section('title', 'Servicios | Crear')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <a href="{{ route('servicios.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
            </a>
            <h1>Nuevo Servicio</h1>
        </div>
    </div>
@stop

@section('content')
    <form class="form-group" method="POST" action="/home/servicios" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card col-md-11">
                    <div class="card-body">
                        @livewire('servicios.form-servicio')
                        <div class="mt-4">
                            <x-adminlte-button theme="success" label="Guardar" type="submit" class="btn btn-sm float-right" icon="fas fa-save" />
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
