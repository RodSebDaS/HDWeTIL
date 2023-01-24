@extends('adminlte::page')

@section('title', 'Historial')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="p-1"></div>
@stop

@section('content')
    <div>
        <span class="h3">Historial</span>
        <a href="{{ url()->previous() }}">
            <x-adminlte-button class="btn-sm float-right oculto-impresion" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
        </a>
        <span class="h6 btn btn-sm btn-light tool"><a id="tooltiphelp" type="button" data-toggle="tooltip" data-placement="top"
                title="Aqui podrás visualizar los pasos realizados en tu solicitud."><i
                    class="far fa-sm) fa-question-circle"></i></a>
        </span>
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
                    <div class="card-footer"></div>
                </div>
            </x-adminlte-card>
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
