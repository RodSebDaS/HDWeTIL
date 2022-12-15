@extends('adminlte::page')

@section('title', 'Auditoría | Show')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Stepper', true)
@section('plugins.BootstrapSelect', true)

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <a href="{{ route('activos.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
            </a>
            <h1>Auditoria</h1>
        </div>
    </div>
@stop

@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="card col-md-11">
                <div class="card-body clearfix">
                  
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
