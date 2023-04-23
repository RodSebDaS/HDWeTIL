@extends('adminlte::page')

@section('title', 'Incidencias')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)
@section('plugins.Popper', true)

@section('content_header')
    <div class="p-1"></div>
@stop

@section('content')
    <div>
        <span class="h3">{{ $tipoNombre }}s</span>
        @if (Auth::User()->hasRole('Admin'))
            @if ($tipoNombre == "Incidencia")
                <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                    data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
                </button>
                <div id="tooltip" role="tooltip">
                <i><li class="text-overflow"> Aqui podrás visualizar y dar seguimento a todas las solicitudes, clasificadas como incidencias, que estan siendo atendidas,<br> 
                    pero que aún, no se han resuelto. Se encuentran ordenadas por prioridad y por tiempo inactivo.</li></i>
                <div id="arrow" data-popper-arrow></div>
                </div>
            @else
                <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
                </button>
                <div id="tooltip" role="tooltip">
                <i><li class="text-overflow"> Aqui podrás visualizar y dar seguimento a otros inconvenientes que necesitan ser atendidos,<br> 
                    y que no son incidencias.</li></i>
                <div id="arrow" data-popper-arrow></div>
                </div>
            @endif
        @else
            @if ($tipoNombre == "Incidencia")
                <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                    data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
                </button>
                <div id="tooltip" role="tooltip">
                <i><li class="text-overflow"> Aqui podrás visualizar y dar seguimento a todas las solicitudes, clasificadas como incidencias, que atendiste,<br> 
                    pero que aún, no se han resuelto. Se encuentran ordenadas por prioridad y por tiempo inactivo.</li></i>
                <div id="arrow" data-popper-arrow></div>
                </div>
            @else
                <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
                </button>
                <div id="tooltip" role="tooltip">
                <i><li class="text-overflow"> Aqui podrás visualizar y dar seguimento a otros inconvenientes que necesitan ser atendidos,<br> 
                    y que no son incidencias.</li></i>
                <div id="arrow" data-popper-arrow></div>
                </div>
            @endif
        @endif
        
    </div>
    <div class="content-fluid">
        <div class="row  justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">

                    @livewire('posts.posts-index')
                    
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ url()->previous() }}">
                            <x-adminlte-button class="btn-sm float-right" label="Atras" theme="secondary" icon="fas fa-arrow-circle-left" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            var table = $('#posts').DataTable({
               //"serverSide": true,
               "bProcessing": true,
               "responsive": true,
                "autoWidth": false,
                "fixedHeader": true,
                "ajax": "{{ route('datatable.posts') }}",
               //"sAjaxSource": "{{ 'datatable/posts' }}",
               "order": [
               //     [9, 'desc']
                ],
               "columns": [
                    {data: 'id'},
                    {data: 'created_at'},
                    {data: 'tipo.nombre'},
                    {data: 'titulo'},
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
                                        if (data.id == '4') {
                                            return `<span class="badge badge-pill badge-dark">`+data.nombre+`</span>`
                                        }
                                        if (data.id == '3') {
                                            return `<span class="badge badge-pill badge-danger">`+data.nombre+`</span>`
                                        }
                                        if (data.id == '2') {
                                            return `<span class="badge badge-pill badge-warning">`+data.nombre+`</span>`
                                        }
                                        if (data.id == '1') {
                                            return `<span class="badge badge-pill badge-light">`+data.nombre+`</span>`
                                        }
                                    } else {
                                        return `<span class="badge badge-pill badge-primary">`+'Sin Asignar'+`</span>`
                                    }
                                },
                    },
                    {data: 'updated_at'},
                    {data: 'btn'}
                ],
                "columnDefs": [
                    {"width": "0%","targets": 0},
                    {"width": "15%","targets": 1},
                    {"width": "0%","targets": 2},
                    {"width": "20%","targets": 3},
                    {"width": "0%","targets": 4},
                    {"width": "0%","targets": 5},
                    {"width": "0%","targets": 6},
                    {"width": "10%","targets": 7},
                    {"width": "0%","targets": 8},
                    {"width": "15%","targets": 9},
                    {"width": "0%","targets": 10},
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
                        target: 1,
                        visible: true,
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
                        target: 9,
                        visible: true,
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
                                        return filtro.length || searchString.length? "Listado de " + "{{ $tipoNombre }}s " + "Filtrado por: " + searchString + consulta : "Listado de " + "{{ $tipoNombre }}s"
                                    }
                                    return searchString.length? "Listado de " + "{{ $tipoNombre }}s " + "Filtrado por: " + searchString : "Listado de " + "{{ $tipoNombre }}s"
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
                                        return filtro.length || searchString.length? "Listado de " + "{{ $tipoNombre }}s " + "Filtrado por: " + searchString + consulta : "Listado de " + "{{ $tipoNombre }}s"
                                    }
                                    return searchString.length? "Listado de " + "{{ $tipoNombre }}s " + "Filtrado por: " + searchString : "Listado de " + "{{ $tipoNombre }}s"
                                },
                                className: 'btn btn-light',
                                filename: 'Posts_pdf',
                                //orientation: 'landscape', //portrait
                                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                                exportOptions: {
                                    columns: ':visible',
                                    columns: [0, 1, 2, 3, 4, 5, 6, 8, 9],
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
                                    // Set page margins [left,top,right,bottom] or [horizontal,vertical]!
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
                                    var dfiltro = table.searchBuilder.getDetails();
                                    filtro =  (JSON.stringify(dfiltro, null,''));
                                    if(filtro !== undefined && filtro !== '{}' ){
                                        return filtro.length || searchString.length? "Listado de " + "{{ $tipoNombre }}s " + "Filtrado por: " + searchString + consulta : "Listado de " + "{{ $tipoNombre }}s"
                                    }
                                    return searchString.length? "Listado de " + "{{ $tipoNombre }}s " + "Filtrado por: " + searchString : "Listado de " + "{{ $tipoNombre }}s"
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
                                text: '<i class="fas fa-filter btn-outline-light"></i> ',
                                titleAttr: 'Filtrar por',
                                className: 'btn btn-outline-light',
                                config: {
                                    depthLimit: 2,
                                },
                        },
                ],
                "language": {
                        "loadingRecords": "",
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
    <script>
        @if (session('info'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<h4>{{session('info')}}</h4>',
                showConfirmButton: false,
                type: "success",
                timer: 3500
            })
        @endif
    </script>
@stop