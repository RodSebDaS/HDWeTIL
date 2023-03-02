@extends('adminlte::page')

@section('title', 'Servicios | Editar')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)

@section('content_header')
    <div class="row justify-content-right">
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
        <div>
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body clearfix">
                       @livewire('servicios.form-servicio', ['servicio' => $servicio, 'accion' => 'Edit'])
                        <div class="mt-4">
                            <x-adminlte-button theme="primary" label="Guardar" type="submit" icon="fas fa-save"
                                class="btn btn-sm float-right" />
                        </div>
                    </div>
                    <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')

@stop

@section('js')

@stop