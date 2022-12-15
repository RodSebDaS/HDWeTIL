@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <style>
        .Style0 {
            color: teal;
        }

        .Style0:hover {
            color: rgb(80, 120, 120);
        }

        .Style1 {
            color: red;
        }

        .Style1:hover {
            color: rgb(160, 60, 60);
        }

        .Style2 {
            color: green;
        }

        .Style2:hover {
            color: rgb(100, 150, 60);
        }

        .Style3 {
            color: blue;
        }

        .Style3:hover {
            color: rgb(50, 100, 150);
        }
    </style>
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">
        {{-- Top Navbar --}}
        @if ($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if (!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
       
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if (config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
