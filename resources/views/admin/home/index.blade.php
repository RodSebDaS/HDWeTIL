@extends('adminlte::page')

@section('title', 'Home')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)
@section('plugins.CKEditor5', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Popper', true)

@section('content_header')
    <div class="py-3">
        <span class="h3">Home</span>
        <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
            data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
        </button>
        <div id="tooltip" role="tooltip">
        <i><li class="text-overflow"> Aqui podrás visualizar las preguntas más frecuentes hechas por los usuarios.<br> 
            Además de ver el puntaje, también, podrás dejar tu calificación. Las mismas se ordenan por relevancia.</li></i>
        <div id="arrow" data-popper-arrow></div>
        </div>
        <hr>
    </div>
@stop

@section('content')
<div class="content-fluid">
    <div class="row  justify-content-center">
        <div class="col-md-12">
            <div>
                @if (isset($posts))
                    @livewire('home.home-index', ['posts' => $posts, 'tipos' => $tipos, 'prioridades' => $prioridades])
                @else
                    @livewire('home.home-index')
                @endif
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        @if (session('info'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<h4>{{session('info')}}</h4>',
                showConfirmButton: false,
                type: "success",
                timer: 3500
            })
        @endif
    </script>
@stop
