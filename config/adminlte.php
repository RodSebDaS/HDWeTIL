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
    'logo_img_xl_class' => 'brand-image-xs',
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

    'layout_topnav' => false,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
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
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
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

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => false,
    'sidebar_scrollbar_theme' => 'os-theme-none',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
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

    'right_sidebar' => true,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
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
            'type' => 'navbar-search',
            'text' => 'Buscar',
            'topnav_right' => true,
            //'url'  =>  '',
            //'method'  => 'post',
        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],
        [
            'text' => '',
            'url'  =>  '0',
            'topnav_right' => true,
            'icon' => 'far fa-bell',
            //'label' =>  '0',
            'label_color' => 'warning',
            'icon_color' => '',
        ],      
        // Sidebar items:
        // [
        //     'type' => 'sidebar-menu-search',
        //     'text' => 'search',
        // ],

        // [
        //     'text' => 'blog',
        //     'url'  => 'admin/blog',
        //     'can'  => 'manage-blog',
        // ],
        [
            'text' => 'Home',
            'route' => 'admin.home',
            'icon' => 'fas fa-home',
            'can'  => 'admin.home',
           
        ],
        [
            'text' => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'fas fa-sitemap',//fas fa-th-large//fas fa-table	
            //'can'  => 'admin.admin.dashboard',
           
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
            'icon' => 'fas fa-exclamation',
            'icon_color' => 'info',
            'can'  => 'solicitudes.index',

        ],
        [
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
                    'text' => 'Solucionadas',
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
        [
            'text' => 'Otros',
            'route'  => 'posts.otros',
            'icon' => 'far fa-clone',//far fa-sticky-note',
            'icon_color' => 'info',
            'can'  => 'posts.otros',
        ],
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
        // [
        //     'text'        => 'pages',
        //     'url'         => 'admin/pages',
        //     'icon'        => 'far fa-fw fa-file',
        //     'label'       => 4,
        //     'label_color' => 'success',
        // ],
        // ['header' => 'CONFIGURACIÓN DE CUENTA'],
        // [
        //     'text' => 'profile',
        //     'url'  => 'admin/settings',
        //     'icon' => 'fas fa-fw fa-user',
        // ],
        // [
        //     'text' => 'change_password',
        //     'url'  => 'admin/settings',
        //     'icon' => 'fas fa-fw fa-lock',
        // ],
       /*  [
        'text'    => 'multilevel',
           'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                            [
                            'text' => 'level_two',
                                    'url'  => '#',
                            ],
                                [
                                'text'    => 'level_two',
                                    'url'     => '#',
                                    'submenu' => [
                                                [
                                                'text' => 'level_three',
                                                    'url'  => '#',
                                                ],
                                                [
                                                'text' => 'level_three',
                                                    'url'  => '#',
                                                ],
                                    ],
                                ],
                    ],
               ],
               [
                 'text' => 'level_one',
                    'url'  => '#',
                ],
             ],
         ], */
        // ['header' => 'labels'],
        // [
        //     'text'       => 'important',
        //     'icon_color' => 'red',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
        // ],
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
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//code.jquery.com/jquery-3.5.1.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js',
                    //'location' => '//cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/moment/moment.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css',
                   
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css',
                   
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css',
                    //'location' => '//cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css',
                   
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/responsive/css/responsive.bootstrap4.min.css',
                ],
                //Export Data
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.print.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/jszip/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/vfs_fonts.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/css/buttons.bootstrap4.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css',
                ],
                 //DataTime
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/datetime/js/dataTables.dateTime.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/datetime/css/dataTables.dateTime.min.css',
                ],
                // Filtros #searchBuilder 
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/searchbuilder/css/searchBuilder.bootstrap4.min.css',
                     //cdn.datatables.net/searchbuilder/1.3.4/css/searchBuilder.bootstrap4.min.css",
                ],
                [ 
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/searchbuilder/js/dataTables.searchBuilder.min.js',
                ],
                [ 
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/searchbuilder/js/searchBuilder.bootstrap4.min.js',
                ],
                //RowGroup
                 [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/rowgroup/css/rowGroup.bootstrap4.min.css',
                ],
                [ 
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/rowgroup/js/dataTables.rowGroup.min.js',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
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
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
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
        'Pace' => [
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
        ],
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
               /*  [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.ckeditor.com/ckeditor5/35.0.1/inline/ckeditor.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.ckeditor.com/ckeditor5/35.0.1/decoupled-document/ckeditor.js',
                ], */
            ],
        ],
        'Summernote' => [
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
        ],
        'Stepper' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css',
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
