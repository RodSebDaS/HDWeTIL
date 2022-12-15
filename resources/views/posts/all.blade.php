@extends('adminlte::page')

@section('title', 'Incidencias')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)

@section('content_header')
    <div>
        <span class="h3">Lista de {{ $tipoNombre }}s</span>
        <span class="h5 btn btn btn-light tool float-center"><i class="far fa-sm fa-question-circle"></i></span>
    </div>
@stop

@section('content')
    @livewire('posts.posts-index')
@stop

@section('css')
<script>
    div.container {
        width: 80%;
    }
</script>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#posts').DataTable({
               //"serverSide": true,
               "bProcessing": true,
               "responsive": true,
                "autoWidth": false,
                "fixedHeader": true,
                "ajax": "{{ route('datatable.posts') }}",
               //"sAjaxSource": "{{ 'datatable/posts' }}",
               "columns": [
                    {data: 'id'},
                    {data: 'created_at'},
                    {data: 'tipo.nombre'},
                    {data: 'titulo'},
                    {data: 'servicio'},
                    {data: 'activo'},
                    {data: 'estado.nombre'},
                    {data: 'flujovalor.nombre'},
                    {data: 'prioridad.nombre'},
                    {data: 'sla'},
                    {data: 'btn'}
                ],
                "columnDefs": [
                    {"width": "0%","targets": 0},
                    {"width": "5%","targets": 1},
                    {"width": "0%","targets": 2},
                    {"width": "15%","targets": 3},
                    {"width": "0%","targets": 4},
                    {"width": "0%","targets": 5},
                    {"width": "0%","targets": 6},
                    {"width": "5%","targets": 7},
                    {"width": "0%","targets": 8},
                    {"width": "6%","targets": 9},
                    {"width": "6%","targets": 10},
                    @if ($ruta == 'posts.otros')
                    {
                        target: 2,
                        visible: true,
                    },
                    @else
                    {
                        target: 2,
                        visible: false,
                    },
                    @endif
                    {
                        target: 4,
                        visible: false,
                    },
                    {
                        target: 5,
                        visible: false,
                    },
                    @if ((Auth::User()->roles()->pluck('level')->first()) or (Auth::User()->hasRole('Admin')))
                        {   target: 8,
                            visible: true,
                        },
                    @else
                        {   target: 8,
                            visible: false,
                        },
                    @endif
                ],
                dom: 'Bfrtlp',
                buttons: [{
                            extend: 'print',
                            text: '<i class="fa fa-print Style0"></i> ',
                            titleAttr: 'Imprimir',
                            className: 'btn btn-light'
                            },
                            {
                            extend: 'pdfHtml5',
                            text: '<i class="fas fa-file-pdf Style1"></i> ',
                            titleAttr: 'Exportar a PDF',
                            className: 'btn btn-light'
                            },
                            {
                            extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel Style2"></i> ',
                            titleAttr: 'Exportar a Excel',
                            className: 'btn btn-light'
                            },
                            {
                            extend: 'copy',
                            text: '<i class="far fa-copy Style3"></i> ',
                            titleAttr: 'Copiar al Portapapeles',
                            className: 'btn btn-light'
                            },
                            {
                            extend: 'searchBuilder',
                            text: '<i class="fas fa-filter btn-tool"></i> ',
                            titleAttr: 'Filtrar por',
                            className: 'btn btn-light',
                            config: {
                                depthLimit: 2
                            },
                }],
                "language": {
                        url: '{{ "/vendor/datatables/i18n/es-ES.json" }}',
                        "lengthMenu": "Mostrar: " +
                            `<select class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value = '10'>10</option>
                                            <option value = '25'>25</option>
                                            <option value = '50'>50</option>
                                            <option value = '100'>100</option>
                                            <option value = '-1'>Todos</option>
                                        </select>` +
                            " registros por página",
                        },  
            });
        });
    </script>
@stop