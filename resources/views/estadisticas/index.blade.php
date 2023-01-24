@extends('adminlte::page')

@section('title', 'Estadísticas')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="p-1"></div>
@stop

@section('content')
    <div>
        <span class="h3">Estadisticasxxx</span>
        <span class="h5 btn btn btn-light tool float-center"><i class="far fa-sm fa-question-circle"></i></span>
    </div>
    @livewire('estadisticas.estadisticas-index')
    
@stop

@section('css')
<script>
    div.container {
        width: 80%;
    }
</script>
@stop

@section('js')

@endsection