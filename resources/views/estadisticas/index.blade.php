@extends('adminlte::page')

@section('title', 'Estadísticas')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)

@section('content_header')
    <div>
        <span class="h3">Estadisticas</span>
        <span class="h5 btn btn btn-light tool float-center"><i class="far fa-sm fa-question-circle"></i></span>
    </div>
@stop

@section('content')
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
    <script>

        $(document).ready(function() {
            $('#activos').DataTable({
               //"serverSide": true,
               "bProcessing": true,
               "responsive": true,
                "autoWidth": false,
                "fixedHeader": true,
               "sAjaxSource": "{{ 'datatable/activos' }}",
               "columns": [
                    {data: 'id'},
                    {data: 'fecha_adquisicion'},
                    {data: 'nombre'},
                    {data: 'marca.nombre'},
                    {data: 'modelo.nombre'},
                    {data: 'personas[].nombre'},
                    {data: 'area.nombre'},
                    {data: 'estado.nombre'},
                    {data: 'valor'},
                    {data: 'vida_util'},
                    {data: 'amortizacion'},
                    {data: 'btn'}
                ],
                "columnDefs": [
                    {"width": "0%","targets": 0},
                    {"width": "1%","targets": 1},
                    {"width": "10%","targets": 2},
                    {"width": "0%","targets": 3},
                    {"width": "0%","targets": 4},
                    {"width": "2%","targets": 5},
                    {"width": "2%","targets": 6},
                    {"width": "2%","targets": 7},
                    {"width": "3%","targets": 8},
                    {"width": "0%","targets": 9},
                    {"width": "0%","targets": 10},
                    {"width": "1%","targets": 11},
                    {   "data": null,
                        render: function (data, type, row) {
                            return `<b>${data}</b>` + `<b> ${row.marca.nombre}</b> ${row.modelo.nombre}`;
                        },
                        targets: 2,
                    },
                        {target: 3, visible: false},
                        {target: 4, visible: false},
                    {  
                        "data": null,
                        render: function (data, type, row) {
                            return (`${data}`/ Math.pow(1 +(`${row.amortizacion}`/`100`),`${row.vida_util}`)).toFixed(2);
                        },
                        targets: 8,
                    },
                        {target: 9, visible: false},
                        {target: 10, visible: false},
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