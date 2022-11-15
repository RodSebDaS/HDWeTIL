@extends('adminlte::page')

@section('title', 'Posts | Atender')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <div>
                <span class="h3">Lista de {{ $tipoNombre }}s {{ $estadoNombre }}s</span>
                <span class="h6 btn btn-sm btn-light tool"><a id="tooltiphelp" type="button" data-toggle="tooltip"
                        data-placement="top"
                        title="Aqui podrás visualizar y dar seguimento a todas las solicitudes que atendiste."><i
                            class="far fa-sm fa-question-circle"></i></a>
                </span>
            </div>
        </div>
    </div>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @livewire('posts.posts-index')
@stop

@section('css')
    <script>
        div.container {
            width: 80 % ;
        }
        tr.group,
            tr.group: hover {
                background - color: #ddd!important;
            }
    </script>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#posts').DataTable({
                //"serverSide": true,
                "bProcessing": true,
                "ajax": "{{ route('datatable.posts') }}",
                //"sAjaxSource": "{{ 'datatable/posts' }}",
                "responsive": true,
                "autoWidth": false,
                "fixedHeader": true,
                order: [
                    [2, 'asc']
                ],
                @if ($ruta == 'posts.atendidas')
                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'titulo'
                        },
                        {
                            data: 'servicio_id'
                        },
                        {
                            data: 'activo_id'
                        },
                        {
                            data: 'estado.nombre'
                        },
                        {
                            data: 'flujovalor.nombre'
                        },
                        {
                            data: 'prioridad.nombre'
                        },
                        {
                            data: 'sla'
                        },
                        {
                            data: 'btn'
                        }
                    ],
                @else
                    rowGroup: {
                        dataSrc: ['user_email_asignated_at']
                    },
                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'post.titulo'
                        },
                        {
                            data: 'servicio_nombre'
                        },
                        {
                            data: 'activo_nombre'
                        },
                        {
                            data: 'estado.nombre'
                        },
                        {
                            data: 'flujovalor.nombre'
                        },
                        {
                            data: 'prioridad.nombre'
                        },
                        {
                            data: 'sla'
                        },
                        {
                            data: 'btn'
                        }
                    ],
                @endif
                "columnDefs": [{
                        "width": "0%",
                        "targets": 0
                    },
                    {
                        "width": "5%",
                        "targets": 1
                    },
                    {
                        "width": "15%",
                        "targets": 2
                    },
                    {
                        "width": "0%",
                        "targets": 3
                    },
                    {
                        "width": "0%",
                        "targets": 4
                    },
                    {
                        "width": "0%",
                        "targets": 5
                    },
                    {
                        "width": "5%",
                        "targets": 6
                    },
                    {
                        "width": "0%",
                        "targets": 7
                    },
                    {
                        "width": "6%",
                        "targets": 8
                    },
                    {
                        "width": "4%",
                        "targets": 9
                    },
                    {
                        target: 3,
                        visible: false,
                    },
                    {
                        target: 4,
                        visible: false,
                    },
                    @if (Auth::User()->roles()->pluck('level')->first() or Auth::User()->hasRole('Admin'))
                        {
                            target: 7,
                            visible: true,
                        },
                    @else
                        {
                            target: 7,
                            visible: false,
                        }
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
                    }
                ],
                "language": {
                    url: '{{ '/vendor/datatables/i18n/es-ES.json' }}',
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
