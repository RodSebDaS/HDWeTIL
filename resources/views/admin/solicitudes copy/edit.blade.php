@extends('adminlte::page')

@section('title', 'Solicitudes | Editar')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)

@section('content_header')
    <h1 class="mx-5">Editar Solicitud</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <form class="form-group" method="POST" action="/home/solicitudes/{{ $post->id }}" enctype="multipart/form-data">
        @method('PUT')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card col-md-11">
                    <div class="card-body clearfix">
                        @livewire('admin.form-post', ['post' => $post])
                        <div class="mt-2">
                            <x-adminlte-button theme="secondary" label="Editar" type="submit"
                                class="btn bnt float-right" />
                        </div>
                        <p><i class="text-danger">(*)</i>Campos requeridos</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
