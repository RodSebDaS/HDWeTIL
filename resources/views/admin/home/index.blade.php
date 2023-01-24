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
        <span class="h5 btn btn btn-light tool float-center"><i class="far fa-sm fa-question-circle"></i></span>
        <hr>
    </div>
@stop

@section('content')
    @if (isset($posts))
        @livewire('home.home-index', ['posts' => $posts, 'tipos' => $tipos, 'prioridades' => $prioridades])
    @else
        @livewire('home.home-index')
    @endif

@stop

@section('css')
@stop

@section('js')
@stop
