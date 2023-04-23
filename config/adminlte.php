<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => 'HDWeTIL |',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */
    
    'logo' => '<b>HDW</b>eTIL',
    'logo_img' => 'vendor/adminlte/dist/img/HDWLogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs logo-xs',
    'logo_img_alt' => 'HDWeTIL',
    

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-info d-flex align-items-center flex-column',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => true,
    'layout_boxed' => false,
    'layout_fixed_sidebar' => false,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => false,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary btn-sm',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => 'text-info',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light navbar-expand-md',
    'classes_topnav_nav' => 'navbar-expand-lg',//'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',//'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => true,
    'sidebar_collapse_remember_no_transition' => false,
    'sidebar_scrollbar_theme' => 'os-theme-none',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => false,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => false,
    'right_sidebar_push' => false,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'forgot-password',
    'password_email_url' => 'reset-password',
    'profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [

        // Navbar items:
        [
            //'type' => 'navbar-search',
            //'text' => 'Buscar',
            //'topnav_right' => true,
            //'url'  =>  '',
            //'method'  => '',notification
        ], 
        [
           /*  'type' => 'link',
            'topnav_right' => true, */
            //'text' => '',
            //'url'  =>  '#',
            'type' => 'link',
            'icon' => 'far fa-bell',
            'topnav_right' => true,
            //'label' =>  3,
            'label_color' => 'warning',
            'icon_color' => '',
        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
            //'label' => 2,
        ],
        [
            'type' => 'darkmode-widget',
            'topnav_right' => true,
            //'label' => 1,
        ],
        [
            'text' => 'Home',
            'route' => 'admin.home',
            'icon' => 'fas fa-home',
            'can'  => 'admin.home',
        ],
        [
            'text' => 'Usuarios',
            'route'  => 'admin.users.index',
            'icon' => 'fas fa-users fa-fw',
            'can'  => 'admin.users.index',
        ],
        [
            'text' => 'Roles',
            'route'  => 'admin.roles.index',
            'icon' => 'fas fa-users-cog fw-fw',
            'can'  => 'admin.roles.index',
        ],
        [
            'text' => 'Solicitudes',
            'route'  => 'solicitudes.index',
            'icon' => 'far fa-clone',//'fas fa-exclamation',
            'icon_color' => 'info',
            'can'  => 'solicitudes.index',
        /*      'submenu' => [
                [
                    'text' => 'Incidencias',
                    'icon' => 'fas fa-exclamation-circle',
                    'icon_color' => 'warning',
                    'can'  => 'posts.atendidas',
                    'route'  => 'posts.atendidas',
                ],
                [
                    'text' => 'Consultas',
                    'icon'    => 'far fa-sticky-note',
                    'icon_color' => 'info',
                    'can'  => 'posts.asignadas',
                    'route'  => 'posts.asignadas',

                ],
                [
                    'text' => 'Quejas',
                    'icon'    => '',
                    'icon_color' => '',
                    'can'  => 'posts.derivadas',
                    'route'  => 'posts.derivadas',
                ],
                [
                    'text' => 'Reclamos',
                    'icon' => '',
                    'icon_color' => '',
                    //'can'  => 'posts.pendientes',
                    'route'  => 'posts.pendientes',
                ],
                [
                    'text' => 'Todas',
                    'icon' => 'far fa-clone',
                    'icon_color' => 'info',
                    //'can'  => 'posts.index',
                    'route'  => 'posts.index',
                ], 
            ], 
        */
        ],
        /* [
            'text'    => 'Incidencias',
            'icon'    => 'far fa-list-alt',//far fa-file-alt', // fas fa-sticky-note
            'icon_color' => 'orange',
            'can'  => 'posts.atendidas',
            'submenu' => [
                [
                    'text' => 'Atendidas',
                    'icon'    => 'fas fa-phone', //fas fa-phone-volume //fas fa-sign-in-alt
                    'icon_color' => 'success',
                    'can'  => 'posts.atendidas',
                    'route'  => 'posts.atendidas',
                ],
                [
                    'text' => 'Asignadas',
                    'icon'    => 'fas fa-reply',
                    'icon_color' => 'success',
                    'can'  => 'posts.asignadas',
                    'route'  => 'posts.asignadas',

                ],
                [
                    'text' => 'Derivadas',
                    'icon'    => 'fas fa-fw fa-share',
                    'icon_color' => 'success',
                    'can'  => 'posts.derivadas',
                    'route'  => 'posts.derivadas',
                ],
                [
                    'text' => 'Pendientes',
                    'icon' => 'fas fa-exclamation-circle',
                    'icon_color' => 'warning',
                    //'can'  => 'posts.pendientes',
                    'route'  => 'posts.pendientes',
                ],
                [
                    'text' => 'Cerradas',
                    'icon'    => 'far fa-check-circle',//far fa-calendar-check',//far fa-check-square',//fas fa-check-double',
                    'icon_color' => 'success',
                    //'can'  => 'posts.index',
                    'route'  => 'posts.cerradas',
                ],
                [
                    'text' => 'Todas',
                    'icon'    => 'fas fa-exclamation-triangle',
                    'icon_color' => 'danger',
                    //'can'  => 'posts.index',
                    'route'  => 'posts.index',
                ], 
            ],
        ],
         */
        /* [
            'text' => 'Otros',
            'route'  => 'posts.otros',
            'icon' => 'far fa-clone',//far fa-sticky-note',
            'icon_color' => 'info',
            'can'  => 'posts.otros',
        ], */
        [
            'text' => 'Activos',
            'route'  => 'activos.index',
            'icon' => 'fas fa-laptop',
            'can'  => 'activos.index',
        ],
        [
            'text' => 'Servicios',
            'route'  => 'servicios.index',
            'icon' => 'fas fa-server',//fas fa-concierge-bell'fas fa-headset',//'fas fa-handshake',//'fas fa-hashtag',
            //'fas fa-star-half-alt',
            'icon_color' => '',
            'can'  => 'servicios.index',

        ],
        [
            'text' => 'Auditoría',
            'route'  => 'auditorias.index',
            'icon' => 'fas fa-fingerprint',
            'icon_color' => '',
            'can'  => 'auditorias.index',

        ],
        [
            'text' => 'Estadísticas',
            'route'  => 'stats.dashboard',
            'icon' => 'fas fa-chart-line',//'fas fa-chart-pie',
            'icon_color' => '',
            'can'  => 'stats',

        ],
        [
            'text' => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'fas fa-sitemap',//fas fa-th-large//fas fa-table	
            //'can'  => 'admin.admin.dashboard',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                //DataTables-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/DataTables-1.13.4/css/jquery.dataTables.min.css',
                    ],
                //AutoFill-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/AutoFill-2.5.3/css/autoFill.dataTables.css',
                    ],
                //Buttons-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/Buttons-2.3.6/css/buttons.dataTables.min.css',
                    ],
                //ColReorder-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/ColReorder-1.6.2/css/colReorder.dataTables.min.css',
                    ],
                //FixedColumns-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/FixedHeader-3.3.2/css/fixedHeader.dataTables.min.css',
                    ],
                //KeyTable-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/KeyTable-2.8.2/css/keyTable.dataTables.min.css',
                    ],
                //Responsive-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/Responsive-2.4.1/css/responsive.dataTables.min.css',
                    ],
                //RowGroup-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/RowGroup-1.3.1/css/rowGroup.dataTables.min.css',
                    ],
                //RowReorder-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/RowReorder-1.3.3/css/rowReorder.dataTables.min.css',
                    ],
                //Scroller-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/Scroller-2.1.1/css/scroller.dataTables.min.css',
                    ],
                //DateTime-css
                    [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables/DateTime-1.4.0/css/dataTables.dateTime.min.css',
                    ],
                //SearchBuilder-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/SearchBuilder-1.4.2/css/searchBuilder.dataTables.min.css',
                    ],
                //SearchPanes-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/SearchPanes-2.1.2/css/searchPanes.dataTables.min.css',
                    ],
                //Select-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/Select-1.6.2/css/select.dataTables.min.css',
                    ],
                //StateRestore-css
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/datatables/StateRestore-1.2.2/css/stateRestore.dataTables.min.css',
                    ],


            
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                
                //jQuery-js 
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/jQuery-3.6.0/jquery-3.6.0.min.js',
                    ],
                //JSZip-js 
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/JSZip-2.5.0/jszip.min.js',
                    ],
                //pdfmake-js 
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/pdfmake-0.1.36/pdfmake.min.js',
                    ],
                    //pdfmake-vfs_fonts-js 
                        [
                            'type' => 'js',
                            'asset' => true,
                            'location' => 'vendor/datatables/pdfmake-0.1.36/vfs_fonts.js',
                        ],
                //DataTables-js 
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/DataTables-1.13.4/js/jquery.dataTables.min.js',
                    ],
                //AutoFill-js 
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/AutoFill-2.5.3/js/dataTables.autoFill.min.js',
                    ],
                //Buttons-js 
                     [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/Buttons-2.3.6/js/dataTables.buttons.min.js',
                    ],
                    //Buttons-colVis-js 
                        [
                            'type' => 'js',
                            'asset' => true,
                            'location' => 'vendor/datatables/Buttons-2.3.6/js/buttons.colVis.min.js',
                        ],
                    //Buttons-html5-js 
                        [
                            'type' => 'js',
                            'asset' => true,
                            'location' => 'vendor/datatables/Buttons-2.3.6/js/buttons.html5.min.js',
                        ],
                    //Buttons-print-js 
                        [
                            'type' => 'js',
                            'asset' => true,
                            'location' => 'vendor/datatables/Buttons-2.3.6/js/buttons.print.min.js',
                        ],
                //ColReorder-js 
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/ColReorder-1.6.2/js/dataTables.colReorder.min.js',
                    ],
                //Moment-js
                        [
                            'type' => 'js',
                            'asset' => true,
                            'location' => 'vendor/moment/locale/es.js',
                        ],
                        [
                            'type' => 'js',
                            'asset' => true,
                            'location' => 'vendor/moment/moment.min.js',
                        ],
                //DataRender-js
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/plugins/dataRender/datetime.js',
                    ], 
                //FixedColumns-js 
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/FixedColumns-4.2.2/js/dataTables.fixedColumns.min.js',
                    ],
                //FixedHeader-js 
                     [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/FixedHeader-3.3.2/js/dataTables.fixedHeader.min.js',
                    ],
                //KeyTable-js
                     [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/KeyTable-2.8.2/js/dataTables.keyTable.min.js',
                    ],
                //Responsive-js
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/Responsive-2.4.1/js/dataTables.responsive.min.js',
                    ],
                //RowGroup-js
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/RowGroup-1.3.1/js/dataTables.rowGroup.min.js',
                    ],
                //RowReorder-js
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/RowReorder-1.3.3/js/dataTables.rowReorder.min.js',
                    ],
                //Scroller-js
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/Scroller-2.1.1/js/dataTables.scroller.min.js',
                    ],
                //DateTime-js
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/DateTime-1.4.0/js/dataTables.dateTime.min.js',
                        ],
                //Datetime-Moment-js
                        [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/plugins/sorting/datetime-moment.js',
                        ],
                //SearchBuilder-js
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/SearchBuilder-1.4.2/js/dataTables.searchBuilder.min.js',
                    ],
                //SearchPanes-js
                       [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/SearchPanes-2.1.2/js/dataTables.searchPanes.min.js',
                    ],
                //Select-js
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/Select-1.6.2/js/dataTables.select.min.js',
                    ],
                //StateRestore-js
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/datatables/StateRestore-1.2.2/js/dataTables.stateRestore.min.js',
                    ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                /*[
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],*/
                /*[
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],*/
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/select2/js/select2.full.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2/css/select2.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css',
                ],
            ],
        ],
        /*'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],*/
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2.all.min.js',
                ],
                
            ],
        ],
        /*'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],*/
        'DateRangePicker' => [
                'active' => false,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/moment/moment.min.js',
                    ],
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'vendor/daterangepicker/daterangepicker.js',
                    ],
                    [
                        'type' => 'css',
                        'asset' => true,
                        'location' => 'vendor/daterangepicker/daterangepicker.css',
                    ],
                ],
        ],
        'TempusDominusBs4' => [
                    'active' => false,
                    'files' => [
                        [
                            'type' => 'js',
                            'asset' => true,
                            'location' => 'vendor/moment/moment.min.js',
                        ],
                        [
                            'type' => 'js',
                            'asset' => true,
                            'location' => 'vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                        ],
                        [
                            'type' => 'css',
                            'asset' => true,
                            'location' => 'vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                        ],
                    ],
        ],
        'BsCustomFileInput' => [
                    'active' => false,
                    'files' => [
                        [
                            'type' => 'js',
                            'asset' => true,
                            'location' => 'vendor/bs-custom-file-input/bs-custom-file-input.min.js',
                        ],
                    ],
        ],
        'CKEditor5' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/ckeditor5-build-classic/build/ckeditor.js',
                ],
            ],
        ],
        /*'Summernote' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.css',
                ],
            ],
        ],*/
        'Stepper' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/bs-stepper/js/bs-stepper.min.js',
                    //'location' => '//cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/bs-stepper/css/bs-stepper.min.css',
                    //'location' => '//cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css',
                ],
            ],
        ],
        'BootstrapSelect' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/bootstrap-select/dist/js/i18n/defaults-*.min.js',
                ],
            ],
        ],
        'Popper' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/popper/popper.min.js',
                ],
            ],
        ],
        /* 'Dropzone' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/dropzone/dropzone.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/dropzone/dropzone.min.js',
                ],
            ],
        ], */
        /*'Filterizr' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/filterizr/filterizr.min',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/filterizr/filterizr.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/filterizr/jquery.filterizr.min',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/filterizr/vanilla.filterizr.min',
                ],
            ],
        ],*/
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => true,
];
