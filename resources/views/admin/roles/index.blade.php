@extends('adminlte::page')

@section('title', 'Roles')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)


@section('content_header')
    <div class="p-1"></div>
@stop

@section('content')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.roles.create') }}">Nuevo Rol</a>
    <h3>Lista de Roles</h3>
    @include('admin.roles.partials.users-list')

@stop

@section('css')
  
@stop

@section('js')
    <script>
        $(document).ready(function() {
           var table = $('#roles').DataTable({
                 "columnDefs": [
                    { "width": "0%", "targets": 0 },
                    { "width": "25%", "targets": 1 },
                    { "width": "1%", "targets": 2 },
                    { "width": "3%", "targets": 3 }
                ],
                responsive: true,
                autoWidth: true,
                fixedHeader: false,
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
                                    return filtro.length || searchString.length? "Listado de Roles " + "Filtrado por: " + searchString + consulta : "Listado de Roles"
                                }
                                return searchString.length? "Listado de Roles Filtrado por: " + searchString : "Listado de Roles"
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
                                columns: [0, 1, 2],
                                stripHtml: false
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
                                    return filtro.length || searchString.length? "Listado de Roles " + "Filtrado por: " + searchString + consulta : "Listado de Roles"
                                }
                                return searchString.length? "Listado de Roles Filtrado por: " + searchString : "Listado de Roles"
                            },
                            className: 'btn btn-light',
                            filename: 'Roles_pdf',
                            //orientation: 'landscape', //portrait
                            pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                            exportOptions: {
                                columns: ':visible',
                                columns: [0, 1, 2],
                                search: 'applied',
                                order: 'applied',
                                modifier:{
                                    page: 'current'
                                },
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
                                // or one number for equal spread
                                // It's important to create enough space at the top for a header !!!
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
                                                width: 24,
                                            },
                                            {
                                                alignment: 'left',
                                                italics: true,
                                                text: 'HDWeTIL',
                                                fontSize: 18,
                                                margin: [10,0]
                                            },
                                            {
                                                alignment: 'center',
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
				            },
                    },
                    {
                        extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel Style2"></i> ',
                            titleAttr: 'Exportar a Excel',
                            filename: 'Roles',
                            title: function() {
                                var searchString = table.search();
                                var dfiltro = table.searchBuilder.getDetails();
                                filtro =  (JSON.stringify(dfiltro, null,''));
                                if(filtro !== undefined && filtro !== '{}' ){
                                    return filtro.length || searchString.length? "Listado de Roles" + "Filtrado por: " + searchString + filtro : "Listado de Roles"
                                }
                                return searchString.length? "Listado de Roles Filtrado por: " + searchString : "Listado de Roles"
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
                    },
                ],
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
@endsection
