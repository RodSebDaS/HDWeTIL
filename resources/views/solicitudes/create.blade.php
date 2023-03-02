@extends('adminlte::page')

@section('title', 'Solicitudes | Crear')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <a href="{{ route('solicitudes.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
            </a>
            <h1>Nueva Solicitud</h1>
        </div>
    </div>
@stop

@section('content')
    @livewire('solicitudes.solicitudes-create')
@stop

@section('css')
@stop

@section('js')  
@stop
