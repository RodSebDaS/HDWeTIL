@extends('adminlte::page')

@section('title', 'Home')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)
@section('plugins.CKEditor5', true)

@section('content_header')
    <div>
        <span class="h3">Home</span>
         <a href="{{ route('admin.home') }}">
                <x-adminlte-button class="btn-sm float-right" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
        </a>
        <span class="h5 btn btn btn-light tool float-center"><i class="far fa-sm fa-question-circle"></i></span>
        <hr>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <h1></h1>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card col-md-11">
                <div class="card-body">
                    @livewire('home.respuesta',['post' => $post])
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
