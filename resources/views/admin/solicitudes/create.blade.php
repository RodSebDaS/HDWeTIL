@extends('adminlte::page')

@section('title', 'Solicitudes | Crear')

@section('plugins.Select2', true)

@section('content_header')
    <h1>Nueva Solicitud</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

        {!! Form::open(['route' => 'admin.solicitudes.store']) !!}

            @include('admin.solicitudes.partials.form')
          
            {!! Form::submit('Crear Solicitud', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script>
        $ ('.js-example-basic').select2({ 
            "placeholder" : "Seleccione un servicio",
            "width": 'resolve'
         });
        $('.js-example-basic-multiple').select2({ 
            "placeholder" : "Seleccione un activo",
            "width": 'resolve'
        });
    </script>
@endsection