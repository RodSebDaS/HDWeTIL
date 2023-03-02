@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Popper', true)

@section('content_header')
    <div class="py-0">
        <span class="h3">Dashboard</span>
        <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
            data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
        </button>
        <div id="tooltip" role="tooltip">
            <i><li class="text-overflow">Aquí en este panel, podrás observar como se encuentran, actualmente, los recursos de la organización y darle seguimento.</li></i>
            <div id="arrow" data-popper-arrow></div>
        </div>
        <hr>
    </div>
@stop

@section('content')

    <div class="content-fluid">
        <div class="row  justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">

                    @livewire('estadisticas.estadisticas-index')
                    
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
@stop

@section('js')

@stop