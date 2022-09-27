@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('plugins.Datatables', true)

@section('content_header')
<a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.solicitudes.create') }}">Nueva Solicitud</a>
<h1>Lista de Solicitudes</h1>
@stop

@section('content')
     @livewire('admin.solicitudes-index')
@stop

@section('js')
<script>
 $('#solicitudes').DataTable({
       "ajax": "{{ route('datatable.solicitud') }}"
       "columns": [ 
                    {data: 'id'},
                    {data: 'created_at'},
                    {data: 'titulo'},                        
                    {data: 'estado.nombre'},
                    {data: 'flujovalor.nombre'},
                    /* {data: 'prioridad.nombre'}, */
                    {data: 'sla'},
                    {data: 'btn'}
         ],
 });
</script>
<script>
    $('#solicitudes').DataTable({
        "columnDefs": [
                    {
                    targets: 1,
                    render: DataTable.render.datetime(),
                    },
                    { "width": "0%", "targets": 0 },
                    { "width": "2%", "targets": 1 },
                    { "width": "5%", "targets": 2 },
                    { "width": "0%", "targets": 3 },
                    { "width": "1%", "targets": 4 },
                   /*  { "width": "0%", "targets": 5 }, */
                    { "width": "2%", "targets": 5 },
                    { "width": "2%", "targets": 6 }
        ],
        
        "responsive": true,
        "autoWidth": false,

        "language": {
            "lengthMenu": "Mostrar: " +
                `<select class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value = '10'>10</option>
                                        <option value = '25'>25</option>
                                        <option value = '50'>50</option>
                                        <option value = '100'>100</option>
                                        <option value = '-1'>Todos</option>
                                    </select>` +
                " registros por página",
            "search": "Buscar:",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "infoEmpty": "No hay registros disponibles",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente",
                "first": "Primero",
                "last": "Último"
            }
        }
    });
</script>
@endsection

