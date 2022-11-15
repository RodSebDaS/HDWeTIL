@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    <form class="form-group " method="GET" action="#">
        <div>
            @livewire('admin.users-index')
        </div>
    </form>
@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#users').DataTable({
                //"ajax": "{ !! route('datatable.users') !! }",
                "bProcessing": true,
                //"bServerSide": true,
               "sAjaxSource": "{{ 'datatable/users' }}",
              
                "columns": [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'btn'}
                ],
                "columnDefs": [{
                        "width": "0%",
                        "targets": 0
                    },
                    {
                        "width": "39%",
                        "targets": 1
                    },
                    {
                        "width": "39%",
                        "targets": 2
                    },
                    {
                        "width": "0",
                        "targets": 3
                    }
                ],
                /* sPaginationType: "full_numbers",
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ], */
                "language": {
                    url: "{{ '/vendor/datatables/i18n/es-ES.json' }}",
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
                "responsive": true,
                "autoWidth": false,
                "fixedHeader": true,
                dom: 'Bfrtlp',
                /* 'Bfrtilp', */
                buttons: [{
                        extend: 'print',
                        text: '<i class="fa fa-print"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> ',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'copy',
                        text: '<i class="far fa-copy"></i> ',
                        titleAttr: 'Copiar al Portapapeles',
                        className: 'btn btn-secondary'
                    },
                    {
                        extend: 'searchBuilder',
                        text: '<i class="fas fa-filter btn-tool"></i> ',
                        titleAttr: 'Filtrar por',
                        className: 'btn btn-light',
                        config: {
                            depthLimit: 2
                        },
                    },
                ],
            });
        });
    </script>
@endsection
