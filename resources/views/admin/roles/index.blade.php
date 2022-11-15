@extends('adminlte::page')

@section('title', 'Roles')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)


@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.roles.create') }}">Nuevo Rol</a>
    <h1>Lista de Roles</h1>
@stop

@section('content')

    @include('admin.roles.partials.users-list')

@stop

@section('css')
  
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#roles').DataTable({
                 "columnDefs": [
                    { "width": "0%", "targets": 0 },
                    { "width": "25%", "targets": 1 },
                    { "width": "1%", "targets": 2 },
                    { "width": "3%", "targets": 3 }
                ],
                responsive: true,
                autoWidth: false,
                "language": {
                    url: "/vendor/datatables/i18n/es-ES.json",
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
                        className: 'btn btn-danger',
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
                        }
                    },
                ],
            });
        });
    </script>
@endsection
