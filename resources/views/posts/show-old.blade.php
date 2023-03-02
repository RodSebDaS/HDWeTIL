@extends('adminlte::page')

@section('title', 'Posts | Show')

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
                    {{--     @if ($accion !== 'Cerrada' && $accion !== 'Rechazada' && $accion !== 'Cancelada')
                    <a href="/home/posts/{{ $post->id }}/rechazar">
                        <x-adminlte-button class="btn-sm float-right" label="Rechazar" theme="secondary"
                            icon="far fa-times-circle" />
                    </a>
                @endif
                @if ($accion == 'Abierta')
                    @livewire('posts.modal-accion', ['post' => $post])
                @endif --}}
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

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div>
        {{--    <form class="form-group" method="PUT" action="#"
            enctype="multipart/form-data"> --}}
        <div>
            @if (!$accion == 'Asignada')
                @livewire('posts.resumen', ['post' => $post])
            @else
                @livewire('posts.resumen', ['post' => $post])
            @endif
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body clearfix">
                        @if ($accion == 'Abierta')
                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Show'])
                        @elseif ($accion == 'Atendida')
                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Atendida'])
                           {{--  @can('posts.atendidas')
                                @livewire('posts.modal-accion', ['post' => $post])
                            @endcan --}}
                            <div class="mt-2">
                                {{--  <x-adminlte-button theme="secondary" label="Editar" type="submit"
                                    class="btn-sm float-right" icon="fas fa-save" /> --}}
                                <a href="{{ "/home/posts/$post->id/edit" }}">
                                    <x-button class="mr-auto float-right btn-sm" type="submit" theme="secondary"
                                        label="Editar" icon="fas fa-save" />
                                </a>
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
