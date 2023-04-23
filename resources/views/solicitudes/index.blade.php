@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Popper', true)

@section('content_header')
    <div class="p-1"></div>
@stop

@section('content')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('solicitudes.create') }}"><i class="fa fa-plus-square" aria-hidden="true" {{-- style="color:rgb(0, 255, 0);" --}}></i>   Nueva Solicitud</a>
    <div>
        <span class="h3">Lista de solicitudes {{-- {{ $estadoNombre }} --}}</span>
        @if ($estadoNombre == 'Sin Atender')
                    <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                        data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
                    </button>
                    <div id="tooltip" role="tooltip">
                        <i><li class="text-overflow">Aqui podrás visualizar y dar seguimento a todas las solicitudes que creaste,<br> 
                            que se encuentran abiertas sin atender.</li></i>
                            <div id="arrow" data-popper-arrow></div>
                    </div>
        @elseif ($estadoNombre == 'Atendidas')
                    <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                        data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
                    </button>
                    <div id="tooltip" role="tooltip">
                        <i><li class="text-overflow"> Aqui podrás visualizar y dar seguimento a todas las solicitudes que estan siendo atendidas.</li></i>
                            <div id="arrow" data-popper-arrow></div>
                    </div>
        @elseif ($estadoNombre == 'Cerradas')
                    <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                        data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
                    </button>
                    <div id="tooltip" role="tooltip">
                        <i><li class="text-overflow"> Aqui podrás visualizar todas las solicitudes que estan cerradas.</li></i>
                            <div id="arrow" data-popper-arrow></div>
                    </div>
        @elseif ($estadoNombre == 'Rechazadas')
                    <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                        data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
                    </button>
                    <div id="tooltip" role="tooltip">
                        <i><li class="text-overflow"> Aqui podrás visualizar todas las solicitudes  rechazadas por algún motivo.<br></li></i>
                            <div id="arrow" data-popper-arrow></div>
                    </div>
        @elseif ($estadoNombre == '')
            <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                    data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
            </button>
            @if (Auth::User()->hasRole('Admin'))
                <div id="tooltip" role="tooltip">
                    <i><li> Aqui podrás visualizar y dar seguimento a todas las solicitudes creadas.</li></i>
                        <div id="arrow" data-popper-arrow></div>
                </div>
            @elseif (Auth::User()->roles()->pluck('level')->first())
                <div id="tooltip" role="tooltip">
                    <i><li> Aqui podrás visualizar y dar seguimento a todas las solicitudes creadas,<br> 
                        que se encuentran abiertas sin atender o rechazadas por algún motivo. </li></i>
                        <div id="arrow" data-popper-arrow></div>
                </div>
            @else
                <div id="tooltip" role="tooltip">
                    <i><li> Aqui podrás visualizar y dar seguimento a todas las solicitudes creadas.
                        En que estado y etapa se encuentran. </li></i>
                        <div id="arrow" data-popper-arrow></div>
                </div>
            @endif
        @endif
    </div>
    <div class="content-fluid">
        <div class="row  justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">

                    @livewire('solicitudes.solicitudes-index')
                
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
            moment.locale('es');
            moment.updateLocale(moment.locale(), { invalidDate: "" });
            $.extend( true, $.fn.dataTable.DateTime, {  // datetime language
                defaults:{
                i18n: {
                unknown: 'Desconocido', hours: 'Horas', seconds : 'Segundos',
                previous: 'Anterior', next: 'Siguiente',
                months:   [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
                weekdays: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ], unknown:  '?',
                },
                locale: 'es',
                invalidDate: 'Fecha inválida',
                displayFormat: 'ddd DD MMM YYYY HH:mm',
                wireFormat: 'ddd DD MMM YYYY HH:mm',
                showWeekNumber: 1,
                yearRange: 23}
            });
            var table = $('#solicitudes').DataTable({
               //"serverSide": true,
               "bProcessing": true,
               "responsive": true,
                "autoWidth": false,
                "fixedHeader": true,
                "ajax": "{{ route('datatable.solicitudes') }}",
                //"sAjaxSource": "{{ 'datatable/solicitudes' }}",
               
               "columns": [
                @if (Auth::User()->hasRole('Admin'))
                    { data: 'id' },
                @else
                    { data: 'id' },
                @endif
                    { data: 'tipo',
                                render: function ( data ) {
                                    if (data != null) {
                                        return data.nombre;
                                    } else {
                                        return 'Sin Asignar';
                                    }
                                },
                    },
                    { data: 'created_at' },
                    { data: 'titulo' },
                    { data: 'servicio',
                            render: function ( data ) {
                                if (data != null) {
                                    return data.nombre; 
                                } else {
                                    return 'Sin Asignar';
                                }
                            },
                    },
                    { data: 'activo',
                                render: function ( data ) {
                                    if (data != null) {
                                        return data.nombre;
                                    } else {
                                        return 'Sin Asignar';
                                    }
                                },
                    },
                    { data: 'estado',
                                render: function ( data ) {
                                    if (data != null) {
                                        return data.nombre; 
                                    } else {
                                        return 'Sin Asignar';
                                    }
                                },
                    },
                    { data: 'flujovalor',
                            render: function ( data ) {
                                if (data != null) {
                                    if (data.id == '1') {
                                        return `<span class="badge badge-pill badge-primary">`+data.nombre+`</span>`
                                    }
                                    if (data.id == '2') {
                                        return `<span class="badge badge-pill badge-warning">`+data.nombre+`</span>`
                                    }
                                    if (data.id == '3') {
                                        return `<span class="badge badge-pill badge-warning">`+data.nombre+`</span>`
                                    }
                                    if (data.id == '4') {
                                        return `<span class="badge badge-pill badge-success">`+data.nombre+`</span>`
                                    }
                                    if (data.id == '5') {
                                        return `<span class="badge badge-pill badge-warning">`+data.nombre+`</span>`
                                    }
                                    if (data.id == '6') {
                                        return `<span class="badge badge-pill badge-secondary">`+data.nombre+`</span>`
                                    }
                                } else {
                                    return `<span class="badge badge-pill badge-light">`+'Sin Asignar'+`</span>`
                                }
                        },
                    },
                    { data: 'prioridad',
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
                                            return `<span class="badge badge-pill badge-info">`+data.nombre+`</span>`
                                        }
                                    } else {
                                        return `<span class="badge badge-pill badge-light">`+'Sin Asignar'+`</span>`
                                    }
                            },
                    },
                    { data: 'updated_at' },
                    { data: 'created'},
                    { data: 'btn' }
                ],
                @if ((Auth::User()->roles()->pluck('level')->first()) or (Auth::User()->hasRole('Admin')))
                        "order": [
                            //[8, 'desc']
                        ],
                        searchPanes: {
                            threshold: 1,
                            columns: [1, 6, 7],
                        },
                    @else
                       "order": [
                                //[8, 'desc']
                       ],
                       searchPanes: {
                            threshold: 1,
                            columns: [1, 6, 7],
                        },
                @endif
                "columnDefs": [
                    {"width": "0%","targets": 0},
                    {"width": "0%","targets": 1},
                    {"width": "8%","targets": 2},
                    {"width": "20%","targets": 3},
                    {"width": "0%","targets": 4},
                    {"width": "0%","targets": 5},
                    {"width": "0%","targets": 6},
                    {"width": "0%","targets": 7},
                    {"width": "0%","targets": 8},
                    {"width": "5%","targets": 9},
                    {"width": "0%","targets": 10},
                    {"width": "0%","targets": 11},
                    {
                        target: 1,
                        visible: true,
                        searchPanes: {
                                    initCollapsed: true,
                                    show: true
                        },
                    },
                    {
                        target: 4,
                        visible: false,
                    },
                    {
                        target: 5,
                        visible: false,
                    },
                    { targets: 6, visible: true,
                                searchPanes: {
                                    initCollapsed: true,
                                    show: true
                                },
                        },
                    { targets: 7, visible: true,
                                searchPanes: {
                                    initCollapsed: true,
                                    show: true
                                },
                    },
                    @if ((Auth::User()->roles()->pluck('level')->first()) or (Auth::User()->hasRole('Admin')))

                        { targets: 6, visible: true,
                                searchPanes: {
                                    initCollapsed: true,
                                    show: true
                                },
                        },
                        { targets: 7, visible: true,
                                searchPanes: {
                                    initCollapsed: true,
                                    show: true
                                },
                        },
                        {   target: 8,
                            visible: true,
                        },
                        {
                            target: 9,
                            visible: true,
                        },
                        {
                            target: 10,
                            visible: false,
                            type: 'moment-DD/MM/YYYY HH:mm'
                        },
                    @else
                        {   target: 8,
                            visible: false,
                        },
                        {
                            target: 9,
                            visible: true,
                        },
                        {
                            target: 10,
                            visible: false,
                            type: 'moment-DD/MM/YYYY HH:mm'
                        },
                    @endif
                ],
                @if ($estadoNombre == "")
                    dom: 'PBfrtlip',
                @elseif ($estadoNombre == 'Sin Atender')
                    dom: 'QBfrtlip',
                        searchBuilder: {
                            preDefined: {
                                criteria:[
                                    {
                                        @if (count($solicitudes) > 0)
                                            condition: '=',
                                            data: 'Estado',
                                            value: ['Abierta']
                                        @else
                                            condition: 'null',
                                            data: 'Estado'
                                        @endif
                                    }
                                ],
                                logic: 'AND',
                            }
                        },
                @elseif ($estadoNombre == 'Atendidas')
                    dom: 'QBfrtlip',
                    searchBuilder: {
                        preDefined: {
                            criteria:[
                                @if (count($solicitudes) > 0)
                                    {
                                        condition: '=',
                                        /*
                                            data: 'Etapa',
                                            value: ['Sin Atender']
                                        */
                                        data: 'Estado',
                                        value: ['Atendida']
                                    },
                                    {
                                        condition: '=',
                                        data: 'Estado',
                                        value: ['Derivada']
                                    }
                                @else
                                    {
                                        condition: 'null',
                                        data: 'Estado'
                                    }
                                @endif
                            ],
                            logic: 'OR',
                        }
                    },
                @elseif ($estadoNombre == 'Cerradas')
                    dom: 'QBfrtlip',
                    searchBuilder: {
                            preDefined: {
                                criteria:[
                                    {
                                        @if (count($solicitudes) > 0)
                                            condition: '=',
                                            data: 'Estado',
                                            value: ['Cerrada'] 
                                        @else
                                            condition: 'null',
                                            data: 'Estado'
                                        @endif
                                     }
                                ],
                                logic: 'AND',
                            }
                    },
                @elseif ($estadoNombre == 'Rechazadas')
                    dom: 'QBfrtlip',
                    searchBuilder: {
                            preDefined: {
                                criteria:[
                                    {
                                        @if (count($solicitudes) > 0)
                                            condition: '=',
                                            data: 'Estado',
                                            value: ['Rechazada'] 
                                        @else
                                            condition: 'null',
                                            data: 'Estado'
                                        @endif
                                    }
                                ],
                                logic: 'AND',
                            }
                    },
                @elseif ($estadoNombre == 'Incidencias')
                    dom: 'QBfrtlip',
                    searchBuilder: {
                            preDefined: {
                                criteria:[
                                    {
                                        @if (count($solicitudes) > 0)
                                            condition: '=',
                                            data: 'Tipo',
                                            value: ['Incidencia'] 
                                        @else
                                            condition: 'null',
                                            data: 'Estado'
                                        @endif
                                    }
                                ],
                                logic: 'AND',
                            }
                    },
                @elseif ($estadoNombre == 'Derivadas')
                    dom: 'QBfrtlip',
                    searchBuilder: {
                            preDefined: {
                                criteria:[
                                    {
                                        @if (count($solicitudes) > 0)
                                            condition: '=',
                                            data: 'Estado',
                                            value: ['Derivada'] 
                                        @else
                                            condition: 'null',
                                            data: 'Estado'
                                        @endif
                                    }
                                ],
                                logic: 'AND',
                            }
                    },
                @endif
                buttons:[{
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
                                                if (c.condition == "starts") {
                                                    consulta += ' ' + c.data + ' ' + ' - Empieza con: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!starts") {
                                                    consulta += ' ' + c.data + ' ' + ' - No empieza con: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "contains") {
                                                    consulta += ' ' + c.data + ' ' + ' - Contiene: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!contains") {
                                                    consulta += ' ' + c.data + ' ' + ' - No contiene: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "ends") {
                                                    consulta += ' ' + c.data + ' ' + ' - Termina en: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!ends") {
                                                    consulta += ' ' + c.data + ' ' + ' - No termina con:' + ' ' + c.value + ' '
                                                } else if (c.condition == "between") {
                                                    consulta += ' ' + c.data + ' ' + ' - Entre: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!between")  {
                                                    consulta += ' ' + c.data + ' ' + ' - No entre: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "null")  {
                                                    consulta += ' ' + c.data + ' ' + ' - Vacio ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!null")  {
                                                    consulta += ' ' + c.data + ' ' + ' - No vacio ' + ' ' + c.value + ' '
                                                } else {
                                                    consulta += ' ' + c.data + ' ' + c.condition + ' ' + c.value + ' '   
                                                }
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
                                    return  filtro.length || searchString.length? "Listado de Solicitudes Filtrado por " + consulta : "Listado de Solicitudes"
                                }
                                return searchString.length? "Listado de Solicitudes Filtrado por " + searchString : "Listado de Solicitudes"
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
                                columns: [0, 1, 2, 5, 6, 8],
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
                                                if (c.condition == "starts") {
                                                    consulta += ' ' + c.data + ' ' + ' - Empieza con: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!starts") {
                                                    consulta += ' ' + c.data + ' ' + ' - No empieza con: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "contains") {
                                                    consulta += ' ' + c.data + ' ' + ' - Contiene: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!contains") {
                                                    consulta += ' ' + c.data + ' ' + ' - No contiene: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "ends") {
                                                    consulta += ' ' + c.data + ' ' + ' - Termina en: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!ends") {
                                                    consulta += ' ' + c.data + ' ' + ' - No termina con:' + ' ' + c.value + ' '
                                                } else if (c.condition == "between") {
                                                    consulta += ' ' + c.data + ' ' + ' - Entre: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!between")  {
                                                    consulta += ' ' + c.data + ' ' + ' - No entre: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "null")  {
                                                    consulta += ' ' + c.data + ' ' + ' - Vacio ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!null")  {
                                                    consulta += ' ' + c.data + ' ' + ' - No vacio ' + ' ' + c.value + ' '
                                                } else {
                                                    consulta += ' ' + c.data + ' ' + c.condition + ' ' + c.value + ' '   
                                                }
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
                                    return  filtro.length || searchString.length? "Listado de Solicitudes Filtrado por " + consulta : "Listado de Solicitudes"
                                }
                                return searchString.length? "Listado de Solicitudes Filtrado por " + searchString : "Listado de Solicitudes"
                            },
                            className: 'btn btn-light',
                            filename: 'Solicitudes_pdf',
                            //orientation: 'landscape', //portrait
                            pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                            exportOptions: {
                                columns: ':visible',
                                columns: [0, 1, 2, 5, 6, 8],
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
                                filename: 'Solicitudes',
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
                                                if (c.condition == "starts") {
                                                    consulta += ' ' + c.data + ' ' + ' - Empieza con: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!starts") {
                                                    consulta += ' ' + c.data + ' ' + ' - No empieza con: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "contains") {
                                                    consulta += ' ' + c.data + ' ' + ' - Contiene: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!contains") {
                                                    consulta += ' ' + c.data + ' ' + ' - No contiene: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "ends") {
                                                    consulta += ' ' + c.data + ' ' + ' - Termina en: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!ends") {
                                                    consulta += ' ' + c.data + ' ' + ' - No termina con:' + ' ' + c.value + ' '
                                                } else if (c.condition == "between") {
                                                    consulta += ' ' + c.data + ' ' + ' - Entre: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!between")  {
                                                    consulta += ' ' + c.data + ' ' + ' - No entre: ' + ' ' + c.value + ' '
                                                } else if (c.condition == "null")  {
                                                    consulta += ' ' + c.data + ' ' + ' - Vacio ' + ' ' + c.value + ' '
                                                } else if (c.condition == "!null")  {
                                                    consulta += ' ' + c.data + ' ' + ' - No vacio ' + ' ' + c.value + ' '
                                                } else {
                                                    consulta += ' ' + c.data + ' ' + c.condition + ' ' + c.value + ' '   
                                                }
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
                                    return  filtro.length || searchString.length? "Listado de Solicitudes Filtrado por " + consulta : "Listado de Solicitudes"
                                }
                                return searchString.length? "Listado de Solicitudes Filtrado por " + searchString : "Listado de Solicitudes"
                            },
                                exportOptions: {
                                columns: ':visible',
                                columns: [0, 1, 2, 5, 6, 8],
                                search: 'applied',
                                order: 'applied',
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
                            @if ($estadoNombre == "")
                                extend: 'searchBuilder',
                                    text: '<i class="fas fa-filter btn-outline-light"></i> ',
                                    titleAttr: 'Filtrar por',
                                    className: 'btn btn-outline-light',
                                    config: {
                                        depthLimit: 2,
                                    },
                            @else
                                extend: 'searchBuilder',
                                    text: '<i class="fas fa-filter btn-outline-light disabled "></i> ',
                                    titleAttr: 'Filtrar por',
                                    className: 'btn btn-outline-light disabled',
                            @endif
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
@endsection