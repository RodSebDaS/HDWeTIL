@extends('adminlte::page')

@section('title', 'Posts | Editar')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Stepper', true)
@section('plugins.BootstrapSelect', true)

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <form wire:submit.prevent class="form-group" method="POST" action="/home/posts/{{ $post->id }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mt-2">
                    <a href="{{ route('posts.index') }}">
                        <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
                    </a>
                    @livewire('posts.modal-accion', ['post' => $post, 'accion' => 'Atender'])
                </div>
            </form>
            <h1>Atender Solicitud</h1>
        </div>
    </div>
@stop

@section('content')
    <div>
        <form class="form-group" method="POST" action="/home/posts/{{ $post->id }}"
            enctype="multipart/form-data">
            @method('PUT')
            <div>
                @livewire('posts.resumen', ['post' => $post])
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-body clearfix">
{{--                             @livewire('posts.form-post', ['post' => $post])
 --}}                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Edit'])
                            <div class="mt-2">
                                <x-adminlte-button theme="secondary" label="Editar" type="submit"
                                    class="btn-sm float-right" icon="fas fa-save" />
                                    @livewire('posts.modal-accion', ['post' => $post, 'accion' => 'Cerrar'])
                                    @livewire('posts.modal-accion', ['post' => $post, 'accion' => 'Derivar'])
                            </div>
                        </div>
                        <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
                    </div>
                </div>
            </div>
        </form>
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
