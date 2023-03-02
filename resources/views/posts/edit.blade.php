@extends('adminlte::page')

@section('title', 'Solicitudes | Editar')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Stepper', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <x-stepper-header id="stepEdit" :valor="$post" />

    <div class="row justify-content-right">
        <div class="col-md-12">
            @can('posts.atendidas')
                @if ($accion == 'Abierta' || $accion == 'Derivada')
                    {{--<a href="/home/posts/{{ $post->id }}/rechazar">
                        <x-adminlte-button class="btn-sm float-right" label="Rechazar" theme="secondary" icon="far fa-times-circle"
                            onclick="return confirm('Esta seguro de rechazar la solicitud?')" />
                    </a>
                    <a href="{{ route('solicitudes.show', $post->id) }}">
                        <x-adminlte-button class="btn-sm float-right mr-1" label="Atras" theme="secondary"
                            icon="fas fa-arrow-circle-left" />
                    </a>--}}
                    @livewire('posts.modal-accion', ['post' => $post])
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
            <h1>Editar Solicitud</h1>
        </div>
    </div>
@stop

@section('content')
    <form wire:submit.prevent="submit(document.querySelector(#'descripcion').value)" class="form-group"
        action="/home/solicitudes/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <div>
            @livewire('posts.resumen', ['post' => $post])
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body clearfix">
                        @if ($accion == 'Abierta' || $accion == 'Derivada')
                            @can('posts.atendidas')
                                @livewire('posts.form-post', ['post' => $post, 'accion' => 'Show'])
                            @else
                                @livewire('posts.form-post', ['post' => $post, 'accion' => 'Edit'])
                            @endcan
                        @elseif ($accion == 'Atendida')
                            {{-- @livewire('posts.form-post', ['post' => $post, 'accion' => 'Atendida']) --}}
                            @livewire('posts.form-post', ['post' => $post, 'accion' => 'Edit'])
                            {{--   @can('posts.atendidas')
                                @livewire('posts.modal-accion', ['post' => $post])
                            @endcan --}}
                            <div>
                                {{--  <a href="{{ "/home/solicitudes/$post->id/edit" }}">
                                        <x-button class="mr-auto float-right btn btn-sm" type="submit" theme="primary"
                                            label="Editar" icon="fas fa-pen" />
                                    </a> --}}
                                <x-adminlte-button theme="primary" label="Guardar" type="submit"
                                    class="btn btn-sm float-right" icon="fas fa-save" />
                            </div>
                        @elseif ($accion == 'Cerrada' && $post->flujovalor->nombre == 'Sin Resolver')
                          @livewire('posts.form-post', ['post' => $post, 'accion' => 'Edit'])
                          <div>
                              <x-adminlte-button theme="primary" label="Guardar" type="submit"
                                  class="btn btn-sm float-right" icon="fas fa-save" />
                          </div>
                        @elseif ($accion == 'Cerrada')
                          @livewire('posts.form-post', ['post' => $post, 'accion' => 'Show'])
                        @endif
                    </div>
                    <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="bs-stepper.min.css">
@stop

@section('js')
    <script src="bs-stepper.min.js"></script>
    <script>
        var stepper = new Stepper(document.querySelector("#stepEdit"));
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
