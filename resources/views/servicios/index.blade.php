@extends('adminlte::page')

@section('title', 'Servicios')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)

@section('content_header')

    <a class="btn btn-secondary btn-sm float-right" href="{{ route('servicios.create') }}">Nuevo Servicio</a>
    <div>
        <span class="h3">Lista de Servicios</span>
        <span class="h5 btn btn btn-light tool float-center"><i class="far fa-sm fa-question-circle"></i></span>
    </div>
@stop

@section('content')
    @livewire('servicios.servicios-index')
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
            $('#servicios').DataTable({
               //"serverSide": true,
               "bProcessing": true,
               "responsive": true,
                "autoWidth": false,
                "fixedHeader": true,
               "sAjaxSource": "{{ 'datatable/servicios' }}",
               "columns": [
                    {data: 'id'},
                    {data: 'created_at'},
                    {data: 'descripcion'},
                    {data: 'puntajes[].calificacion'},
                    {data: 'valor'},
                    {data: 'btn'}
                ],
                "columnDefs": [
                    {"width": "0%","targets": 0},
                    {"width": "2%","targets": 1},
                    {"width": "10%","targets": 2},
                    {"width": "0%","targets": 3},
                    {"width": "2%","targets": 4},
                    {"width": "2%","targets": 5},
                    {       "data": null,
                            render: function (data, type, row) {
                                return `<b>${data} <font color="#ffd700">★</font></b>`;
                            },
                        targets: 3,
                    },
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
@endsection