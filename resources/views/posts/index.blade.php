@extends('adminlte::page')

@section('title', 'Posts | Atender')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="p-1"></div>
@stop

@section('content')
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
            var table = $('#posts').DataTable({
                //"serverSide": true,
                "bProcessing": true,
                "ajax": "{{ route('datatable.posts') }}",
                //"sAjaxSource": "{{ 'datatable/posts' }}",
                "responsive": true,
                "autoWidth": false,
                "fixedHeader": true,
                order: [
                    [3, 'asc']
                ],
                @if ($ruta == 'posts.atendidas')
                    //rowGroup: {
                    //   dataSrc: ['post.titulo', 'estado.nombre'],
                    //},
                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'tipo_nombre'
                        },
                        {
                            data: 'titulo'
                        },
                        {
                            data: 'servicio_nombre'
                        },
                        {
                            data: 'activo_nombre'
                        },
                        {
                            data: 'estado_nombre',
                        },
                        {
                            data: 'flujo_nombre',
                        },
                        {
                            data: 'prioridad_nombre'
                        },
                        {
                            data: 'sla'
                        },
                        {
                            data: 'btn'
                        }
                    ],
                    "columnDefs": [{
                            "width": "0%",
                            "targets": 0
                        },
                        {
                            "width": "10%",
                            "targets": 1
                        },
                        {
                            "width": "0%",
                            "targets": 2
                        },
                        {
                            "width": "15%",
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
                            "width": "2%",
                            "targets": 6
                        },
                        {
                            "width": "2%",
                            "targets": 7
                        },
                        {
                            "width": "2%",
                            "targets": 8
                        },
                        {
                            "width": "10%",
                            "targets": 9
                        },
                        {
                            "width": "4%",
                            "targets": 10
                        },
                        {
                            target: 2,
                            visible: false,
                        },
                        {
                            target: 4,
                            visible: false,
                        },
                        {
                            target: 5,
                            visible: false,
                        },
                        @if (Auth::User()->roles()->pluck('level')->first() or Auth::User()->hasRole('Admin'))
                            {
                                target: 8,
                                visible: true,
                            },
                        @else
                            {
                                target: 8,
                                visible: false,
                            },
                        @endif
                    ],
                @elseif ($ruta == 'posts.pendientes')

                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'tipo'
                        },
                        {
                            data: 'titulo'
                        },
                        {
                            data: 'servicio',
                            render: function ( data ) {
                                if (data != null) {
                                    return data.nombre; 
                                } else {
                                    return 'Sin Asignar';
                                }
                            },
                        },
                        {
                            data: 'activo',
                                render: function ( data ) {
                                    if (data != null) {
                                        return data.nombre;
                                    } else {
                                        return 'Sin Asignar';
                                    }
                                },
                        },
                        {
                            data: 'estado',
                                render: function ( data ) {
                                    if (data != null) {
                                        return data.nombre; 
                                    } else {
                                        return 'Sin Asignar';
                                    }
                                },
                        },
                        {
                            data: 'flujovalor',
                                render: function ( data ) {
                                    if (data != null) {
                                        return data.nombre; 
                                    } else {
                                        return 'Sin Asignar';
                                    }
                                },
                        },
                        {
                            data: 'prioridad',
                                render: function ( data ) {
                                    if (data != null) {
                                        return data.nombre;
                                    } else {
                                        return 'Sin Asignar';
                                    }
                                },
                        },
                        {
                            data: 'sla'
                        },
                        {
                            data: 'btn'
                        }
                    ],
                    "columnDefs": [{
                            "width": "0%",
                            "targets": 0
                        },
                        {
                            "width": "10%",
                            "targets": 1
                        },
                        {
                            "width": "0%",
                            "targets": 2
                        },
                        {
                            "width": "15%",
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
                            "width": "5%",
                            "targets": 7
                        },
                        {
                            "width": "5%",
                            "targets": 8
                        },
                        {
                            "width": "10%",
                            "targets": 9
                        },
                        {
                            "width": "4%",
                            "targets": 10
                        },
                        {
                        target: 2,
                        visible: false,
                        },
                        {
                            target: 4,
                            visible: false,
                        },
                        {
                            target: 5,
                            visible: false,
                        },
                        @if (Auth::User()->roles()->pluck('level')->first() or Auth::User()->hasRole('Admin'))
                            {
                                target: 8,
                                visible: true,
                            },
                        @else
                            {
                                target: 8,
                                visible: false,
                            },
                        @endif
                    ],
                @elseif ($ruta == 'posts.cerradas')
                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'tipo.nombre'
                        },
                        {
                            data: 'titulo'
                        },
                        {
                            data: 'servicio.nombre'
                        },
                        {
                            data: 'activo.nombre'
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
                    "columnDefs": [{
                            "width": "0%",
                            "targets": 0
                        },
                        {
                            "width": "10%",
                            "targets": 1
                        },
                        {
                            "width": "0%",
                            "targets": 2
                        },
                        {
                            "width": "15%",
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
                            "width": "5%",
                            "targets": 7
                        },
                        {
                            "width": "5%",
                            "targets": 8
                        },
                        {
                            "width": "10%",
                            "targets": 9
                        },
                        {
                            "width": "4%",
                            "targets": 10
                        },
                        {
                        target: 2,
                        visible: false,
                        },
                        {
                            target: 4,
                            visible: false,
                        },
                        {
                            target: 5,
                            visible: false,
                        },
                        @if (Auth::User()->roles()->pluck('level')->first() or Auth::User()->hasRole('Admin'))
                            {
                                target: 8,
                                visible: true,
                            },
                        @else
                            {
                                target: 8,
                                visible: false,
                            },
                        @endif
                    ],
                @else
                    rowGroup: {
                        dataSrc: ['user_name_asignated_at']
                    },
                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'tipo_nombre'
                        },
                        {
                            data: 'titulo'
                        },
                        {
                            data: 'servicio_nombre'
                        },
                        {
                            data: 'activo_nombre'
                        },
                        {
                            data: 'estado_nombre'
                        },
                        {
                            data: 'flujo_nombre'
                        },
                        {
                            data: 'prioridad_nombre'
                        },
                        {
                            data: 'sla'
                        },
                        {
                            data: 'btn'
                        }
                    ],
                    "columnDefs": [{
                            "width": "0%",
                            "targets": 0
                        },
                        {
                            "width": "10%",
                            "targets": 1
                        },
                        {
                            "width": "0%",
                            "targets": 2
                        },
                        {
                            "width": "15%",
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
                            "width": "5%",
                            "targets": 7
                        },
                        {
                            "width": "5%",
                            "targets": 8
                        },
                        {
                            "width": "10%",
                            "targets": 9
                        },
                        {
                            "width": "4%",
                            "targets": 10
                        },
                        {
                            target: 2,
                            visible: false,
                        },
                        {
                            target: 4,
                            visible: false,
                        },
                        {
                            target: 5,
                            visible: false,
                        },
                        {
                            target: 7,
                            visible: true,
                        },
                        @if (Auth::User()->roles()->pluck('level')->first() or Auth::User()->hasRole('Admin'))
                            {
                                target: 8,
                                visible: true,
                            },
                        @else
                            {
                                target: 8,
                                visible: false,
                            },
                        @endif
                    ],
                @endif
                dom: 'Bfrtlip',
                buttons: [{
                        extend: 'print',
                                autoPrint: true,
                                text: '<i class="fa fa-print Style0"></i> ',
                                titleAttr: 'Imprimir',
                                title: function() {
                                    var dfiltro = table.searchBuilder.getDetails();
                                    var consulta = '';
                                    consultar(dfiltro.criteria, dfiltro.logic);
                                    function consultar(criteria, logic) {
                                        if(criteria !== undefined){
                                            criteria.forEach((c, idx, array) => {
                                                if (c.criteria) {
                                                    consulta += ' '
                                                    consultar(c.criteria, c.logic)
                                                    consulta += ' '
                                                } else {
                                                    consulta += ' ' + c.data + ' ' + c.condition + ' ' + c.value[0] + ' '
                                                }
                                                if (idx != array.length - 1) {
                                                    consulta += ' ' + logic
                                                }
                                            })
                                        }
                                    }
                                    var searchString = table.search();
                                    filtro =  (JSON.stringify(dfiltro, null,''));
                                    if(filtro !== undefined && filtro !== '{}' ){
                                        return filtro.length || searchString.length? "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s" + "Filtrado por: " + searchString + consulta : "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s"
                                    }
                                    return searchString.length? "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s" + "Filtrado por: " + searchString : "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s"
                                },
                                customize: function ( win ) {
                                    $(win.document.body)
                                        .css( 'font-size', '10pt' )
                                        .prepend(
                                            '<img src="http://127.0.0.1:8000/vendor/adminlte/dist/img/HDWLogoX.png" style="position:absolute; top:0; left:0; opacity: 0.3;" />'
                                        );
                                    
                                    $(win.document.body).find( 'table' )
                                        .addClass( 'compact' )
                                        .css( 'font-size', 'inherit' );
                                    
                                    $(win.document.body).find('h1').css('text-align','center');
                                },
                                        
                                className: 'btn btn-light',
                                //filename: 'tu título',
                                exportOptions: {
                                    columns: ':visible',
                                    modifier: {
                                        page: 'current',
                                    },
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                                    stripHtml: false,
                                },
                        },
                        {
                        extend: 'pdfHtml5',
                                text: '<i class="fas fa-file-pdf Style1"></i>',
                                titleAttr: 'Exportar a PDF',
                                title: function() {
                                    var dfiltro = table.searchBuilder.getDetails();
                                    var consulta = '';
                                    consultar(dfiltro.criteria, dfiltro.logic);
                                    function consultar(criteria, logic) {
                                        if(criteria !== undefined){
                                            criteria.forEach((c, idx, array) => {
                                                if (c.criteria) {
                                                    consulta += ' '
                                                    consultar(c.criteria, c.logic)
                                                    consulta += ' '
                                                } else {
                                                    consulta += ' ' + c.data + ' ' + c.condition + ' ' + c.value[0] + ' '
                                                }
                                                if (idx != array.length - 1) {
                                                    consulta += ' ' + logic
                                                }
                                            })
                                        }
                                    }
                                    var searchString = table.search();
                                    filtro =  (JSON.stringify(dfiltro, null,''));
                                    if(filtro !== undefined && filtro !== '{}' ){
                                        return filtro.length || searchString.length? "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s" + "Filtrado por: " + searchString + consulta : "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s"
                                    }
                                    return searchString.length? "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s" + "Filtrado por: " + searchString : "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s"
                                },
                                className: 'btn btn-light',
                                filename: 'Posts_pdf',
                                //orientation: 'landscape', //portrait
                                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                                exportOptions: {
                                    columns: ':visible',
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                                    search: 'applied',
                                    order: 'applied',
                                },
                                customize: function (doc) {
                                    //Remove the title created by datatTables
                                    //doc.content.splice(0,1);
                                    //ajustar ancho de la tabla completamente a la página
                                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                    //Create a date string that we use in the footer. Format is dd-mm-yyyy
                                    var now = new Date();
                                    var jsDate = now.getDate()+'/'+(now.getMonth()+1)+'/'+now.getFullYear() + ' - ' + now.getHours() + ':' + now.getMinutes();
                                    // Logo converted to base64
                                    // Done on http://codebeautify.org/image-to-base64-converter
                                    toDataURL('http://127.0.0.1:8000/vendor/adminlte/dist/img/HDWLogo-10.png', function(dataURL){
                                        var base64 = dataURL;
                                        logo = base64;
                                    });
                                    // A documentation reference can be found at
                                    // https://github.com/bpampuch/pdfmake#getting-started
                                    // Set page margins [left,top,right,bottom] or [horizontal,vertical]
                                    doc.pageMargins = [20,60,20,30];
                                    // Set the font size fot the entire document
                                    doc.defaultStyle.fontSize = 7;
                                    // Set the fontsize for the table header
                                    doc.styles.tableHeader.fontSize = 7;
                                    // Set the alignment for the table header
                                    doc.styles.tableHeader.alignment = "left";
                                    // Create a header object with 3 columns
                                    // Left side: Logo
                                    // Middle: brandname
                                    // Right side: A document title
                                    doc['header']=(function() {
                                        return {
                                            columns: [
                                                {
                                                    image: logo,
                                                    width: 24
                                                },
                                                {
                                                    alignment: 'left',
                                                    italics: true,
                                                    text: 'HDWeTIL',
                                                    fontSize: 18,
                                                    margin: [10,0]
                                                },
                                                {
                                                    alignment: 'right',
                                                    fontSize: 14,
                                                    text: ''
                                                }
                                            ],
                                            margin: 20
                                        }
                                    });
                                    // Create a footer object with 2 columns
                                    // Left side: report creation date
                                    // Right side: current page and total pages
                                    doc['footer']=(function(page, pages) {
                                        return {
                                            columns: [
                                                {
                                                    alignment: 'left', 
                                                    text: ['Creado por: {{Auth::User()->name}} ', 'el: ', { text: jsDate.toString() }]
                                                },
                                                {
                                                    alignment: 'right',
                                                    text: ['Página: ', { text: page.toString() }, ' de ',	{ text: pages.toString() }]
                                                }
                                            ],
                                            margin: 20
                                        }
                                    });
                                    // Change dataTable layout (Table styling)
                                    // To use predefined layouts uncomment the line below and comment the custom lines below
                                    // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
                                    var objLayout = {};
                                    objLayout['hLineWidth'] = function(i) { return .5; };
                                    objLayout['vLineWidth'] = function(i) { return .5; };
                                    objLayout['hLineColor'] = function(i) { return '#aaa'; };
                                    objLayout['vLineColor'] = function(i) { return '#aaa'; };
                                    objLayout['paddingLeft'] = function(i) { return 4; };
                                    objLayout['paddingRight'] = function(i) { return 4; };
                                    doc.content[0].layout = objLayout;
                                }
                        },
                        {
                        extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel Style2"></i> ',
                                titleAttr: 'Exportar a Excel',
                                filename: 'Posts',
                                title: function() {
                                    var searchString = table.search();
                                    var dfiltro = table.searchBuilder.getDetails();
                                    filtro =  (JSON.stringify(dfiltro, null,''));
                                    if(filtro !== undefined && filtro !== '{}' ){
                                        return filtro.length || searchString.length? "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s" + "Filtrado por: " + searchString + consulta : "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s"
                                    }
                                    return searchString.length? "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s" + "Filtrado por: " + searchString : "Listado de " + "{{ $tipoNombre }}s {{ $estadoNombre }}s"
                                },
                                className: 'btn btn-light',
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
                                    depthLimit: 2,
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
            table.column(0).data().unique();
        });
    </script>
     <script>
        function toDataURL(src, callback){
           var image = new Image();
           image.crossOrigin = 'Anonymous';
           image.onload = function(){
              var canvas = document.createElement('canvas');
              var context = canvas.getContext('2d');
              canvas.height = this.naturalHeight;
              canvas.width = this.naturalWidth;
              context.drawImage(this, 0, 0);
              var dataURL = canvas.toDataURL('image/jpeg');
              callback(dataURL);
           };
           image.src = src;
        }
     </script>
@stop
