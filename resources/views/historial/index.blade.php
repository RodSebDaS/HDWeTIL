@extends('adminlte::page')

@section('title', 'Historial')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)
@section('plugins.Popper', true)

@section('content_header')
    <div class="p-1"></div>
@stop

@section('content')
    <div>
        <span class="h3">Historial</span>
        {{--<a href="{{ url()->previous() }}">
            <x-adminlte-button class="btn-sm float-right oculto-impresion" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
        </a>--}}
        <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
            data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
        </button>
        <div id="tooltip" role="tooltip">
            <i><li class="text-overflow">Aqui podrás visualizar un historial de las acciones, comentarios y observaciones, realizadas en tu solicitud.</li></i>
            <div id="arrow" data-popper-arrow></div>
        </div>
        <hr>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <x-adminlte-card title="Solicitud Nro: {{ $post->id }} Título: {{ $post->titulo }}" theme="primary"
                theme-mode="sm" icon="fas fa-route" collapsible>
                <div class="card border-success mb-3">
                    {{-- <div class="card-header bg-tool"></div> --}}
                    </h6>
                    <div class="card-body text-success">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        @livewire('posts.time-line', ['post' => $post->id])
                    </div>
                    {{--<div class="card-footer"></div>--}}
                </div>
            </x-adminlte-card>
            <div class="card-footer d-flex justify-content-center">
                <a href="{{ url()->previous() }}">
                    <x-adminlte-button class="btn-sm float-right" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
                </a>
            </div>
        </div>
    </div>
@stop

@section('css')
    <script>
        div.container {
            width: 80 % ;
        }
    </script>
@stop

@section('js')
@endsection
