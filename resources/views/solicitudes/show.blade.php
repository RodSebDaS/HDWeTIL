@extends('adminlte::page')

@section('title', 'Solicitudes | Show')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Stepper', true)
@section('plugins.BootstrapSelect', true)

@section('content_header')

    <x-stepper-header id="stepperHeader" :valor="$post" />

    @can('posts.atendidas')
        <div class="row">
            <div class="col-md-12">
                {{--  <form class="form-group" method="PUT" action="#" enctype="multipart/form-data">
                {{-- @csrf --}}
                <div class="mt-2">
                    @can('posts.atendidas')
                        @if ($accion == 'Abierta' || $accion == 'Derivada')
                        {{--<a href="/home/posts/{{ $post->id }}/rechazar">
                                <x-adminlte-button class="btn-sm float-right" label="Rechazar" theme="secondary"
                                    icon="far fa-times-circle" onclick="return confirm('Esta seguro de rechazar la solicitud?')" />
                            </a>--}}
                            @livewire('posts.modal-accion', ['post' => $post])
                        {{--@elseif($accion == 'Atendida')
                            <a href="/home/posts/{{ $post->id }}/rechazar">
                                <x-adminlte-button class="btn-sm float-right" label="Rechazar" theme="secondary"
                                    icon="far fa-times-circle" />
                            </a>
                        @elseif($accion == 'Cerrada' && $post->flujovalor->nombre == 'Sin Resolver')
                            <a href="/home/posts/{{ $post->id }}/rechazar">
                                <x-adminlte-button class="btn-sm float-right" label="Rechazar" theme="secondary"
                                    icon="far fa-times-circle" />
                            </a>--}}
                        @else
                            <a href="{{ url()->previous() }}">
                                <x-adminlte-button class="btn-sm float-right oculto-impresion" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
                            </a>
                        @endif
                    @else
                        <a href="{{ route('solicitudes.index') }}">
                            <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
                        </a>
                    @endcan
                </div>
                {{--  </form> --}}
                <div>
                    <span class="h3">Atender Solicitud</span>
                    <span class="h6 btn btn-sm btn-light tool"><a id="tooltiphelp" type="button" data-toggle="tooltip"
                            data-placement="top"
                            title="Deberá atender la solicitud para poder vizualiar y dar seguimento a la misma. Muchas gracias!"><i
                                class="far fa-sm fa-question-circle"></i>
                        </a>
                    </span>
                </div>

            </div>
        </div>
    @endcan
@stop

@section('content')

<div>
        <div>
            @if (!$accion == 'Asignada')
                @livewire('posts.resumen', ['post' => $post])
            @else
                @livewire('posts.resumen', ['post' => $post])
            @endif
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body clearfix">
                        @if ($accion == 'Abierta' || $accion == 'Derivada'|| $accion == 'Rechazada')
                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Show'])
                        @elseif ($accion == 'Atendida')
                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Atendida'])
                            {{--@livewire('posts.modal-accion', ['post' => $post])--}}
                            <div class="mt-2">
                                {{--  <x-adminlte-button theme="secondary" label="Editar" type="submit"
                                    class="btn-sm float-right" icon="fas fa-save" /> --}}
                                @can('solicitudes.edit')
                                    <a href="{{ "/home/solicitudes/$post->id/edit" }}">
                                        <x-button class="mr-auto float-right btn btn-sm" type="submit" theme="primary"
                                            label="Editar" icon="fas fa-pen" />
                                    </a>
                                @endcan
                            </div>
                        @elseif ($accion == 'Cerrada' && $post->flujovalor->nombre == 'Solucionada')
                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Show'])
                        @elseif ($accion == 'Cerrada' && $post->flujovalor->nombre == 'Sin Resolver')
                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Atendida'])
                            @livewire('posts.modal-accion', ['post' => $post])
                            <div class="mt-2">
                                {{--  <x-adminlte-button theme="secondary" label="Editar" type="submit"
                                class="btn-sm float-right" icon="fas fa-save" /> --}}
                                @can('solicitudes.edit')
                                    <a href="{{ "/home/solicitudes/$post->id/edit" }}">
                                        <x-button class="mr-auto float-right btn btn-sm" type="submit" theme="primary"
                                            label="Editar" icon="fas fa-pen" />
                                    </a>
                                @endcan
                            </div>
                        @endif
                    </div>
                    <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
                </div>
            </div>
        </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="bs-stepper.min.css">
@stop

@section('js')
    <script src="bs-stepper.min.js"></script>
    <script>
        var stepper = new Stepper(document.querySelector("#stepperHeader"));
        setCurrent();

        function next() {
            stepper.next();
            setCurrent();
        }

        function previous() {
            stepper.previous();
            setCurrent();
        }

        function setCurrent() {
            document.getElementById("current-step").innerText = stepper._currentIndex;
        }
        /* $("#stepper")[0].addEventListener('shown.bs-stepper', function (event) {
        console.log("hello " + event.detail.indexStep)
        }); */
    </script>
    <script>
        var stepper = new Stepper(document.querySelector("#stepper"));
        setCurrent();

        function next() {
            stepper.next();
            setCurrent();
        }

        function previous() {
            stepper.previous();
            setCurrent();
        }

        function setCurrent() {
            document.getElementById("current-step").innerText = stepper._currentIndex;
        }
        /* $("#stepper")[0].addEventListener('shown.bs-stepper', function (event) {
        console.log("hello " + event.detail.indexStep)
        }); */
    </script>
@stop
