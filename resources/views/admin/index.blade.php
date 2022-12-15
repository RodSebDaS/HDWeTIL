@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <div>
        <span class="h3">Dashboard</span>
        <span class="h5 btn btn btn-light tool float-center"><i class="far fa-sm fa-question-circle"></i></span>
        <hr>
    </div>
@stop

@section('content')

    @livewire('estadisticas.estadisticas-index')
@stop

@section('css')
@stop

@section('js')

@stop