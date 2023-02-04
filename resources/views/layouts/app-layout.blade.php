@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

        </head>
        
        <body class="font-sans antialiased">
            <x-jet-banner />
            <div class="min-h-screen bg-gray-100">
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </body>
    </html>
@stop

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    @livewireStyles
    @stack('modals')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    {{-- @livewireScripts --}}
    @vite(['resources/css/app.css'])
@stop
@section('js')
@stack('js')
    @vite(['resources/js/app.js'])
@stop
