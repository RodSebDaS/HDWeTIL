@extends('adminlte::page')

@section('title', 'Solicitudes | Editar')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)

@section('content_header')
    <div class="row justify-content-right">
        <div class="col-md-12">
            <a href="{{ route('solicitudes.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Cancelar" theme="secondary" icon="fas fa-ban" />
            </a>
            <h1>Editar Solicitud</h1>
        </div>
    </div>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <form class="form-group" method="POST" action="/home/solicitudes/{{ $post->id }}" enctype="multipart/form-data">
        @method('PUT')
        <div>
            @livewire('posts.resumen', ['post' => $post])
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body clearfix">
                        @livewire('posts.form-post', ['post' => $post, 'accion' => 'Edit'])
                        <div class="mt-2">
                            <x-adminlte-button theme="secondary" label="Editar" type="submit"
                                class="btn bnt float-right" />
                        </div>
                    </div>
                    <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
@stop

@section('js')

@stop
