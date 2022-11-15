@extends('adminlte::page')

@section('title', 'Posts | Show')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Stepper', true)
@section('plugins.BootstrapSelect', true)

{{-- @livewire('posts.show', ['post' => $post, 'accion' => $accion]) --}}
@section('content_header')
    <div class="row">
        <div class="col-md-12">
            {{--  <form class="form-group" method="PUT" action="#" enctype="multipart/form-data">
                {{-- @csrf --}}
            <div class="mt-2">
                @if ($accion == 'Abierta')
                    <a href="/home/posts/{{ $post->id }}/rechazar">
                        <x-adminlte-button class="btn-sm float-right" label="Rechazar" theme="secondary"
                            icon="far fa-times-circle" />
                    </a>
                    @livewire('posts.modal-accion', ['post' => $post])
                @elseif($accion == 'Atendida')
                    <a href="/home/posts/{{ $post->id }}/rechazar">
                        <x-adminlte-button class="btn-sm float-right" label="Rechazar" theme="secondary"
                            icon="far fa-times-circle" />
                    </a>
                @endif
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
@stop

@section('content')
    <div>
        @if (session('info'))
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endif

        {{--    <form class="form-group" method="PUT" action="#"
            enctype="multipart/form-data"> --}}
        <div>
            @livewire('posts.resumen', ['post' => $post])
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body clearfix">

                        @if ($accion !== 'Atendida')
                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Show'])
                        @else
                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Atendida'])
                            <div class="mt-2">
                                {{--  <x-adminlte-button theme="secondary" label="Editar" type="submit"
                                            class="btn-sm float-right" icon="fas fa-save" /> --}}
                                <a href="{{ route('posts.edit', $post->id) }}">
                                    <x-button class="mr-auto float-right btn-sm" type="submit" theme="secondary"
                                        label="Editar" icon="fas fa-save" />
                                </a>
                                @livewire('posts.modal-accion', ['post' => $post])
                            </div>
                        @endif
                    </div>
                    <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="bs-stepper.min.css">
@stop

@section('js')
    <script src="bs-stepper.min.js"></script>
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
