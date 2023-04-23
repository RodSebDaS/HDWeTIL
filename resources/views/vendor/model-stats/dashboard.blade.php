@extends('adminlte::page')

@section('plugins.Popper', true)

@section('content_header')
    <head>
            <!-- Meta Information -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            {{--<link rel="shortcut icon" href="{{ asset('/vendor/telescope/favicon.ico') }}">--}}
        
            <meta name="robots" content="noindex, nofollow">
        
            <title>{{-- ModelStats {{ config('app.name') ? ' - ' . config('app.name') : '' }}--}}</title>
        
            <!-- Style sheets-->
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
            <link href="{{ asset(mix('app.css', 'vendor/model-stats')) }}" rel="stylesheet" type="text/css">
    </head>
@stop

@section('content')
    <div class="content-fluid">
        <div class="row  justify-content-center">
            <div class="col-md-11">
                <div>
                    <span class="h3">Estadísticas</span>
                        <button id="button" aria-describedby="tooltip" data-toggle="tooltip"
                            data-placement="top" class="h6 btn btn-sm btn-light tool"><i class="far fa-sm fa-question-circle" style="color:skyBlue;"></i>
                        </button>
                        <div id="tooltip" role="tooltip">
                            <i><li class="text-overflow">Aqui podrás visualizar, en distintos tipos de gráficos, los datos estadísticos de tus incidencias.</li></i>
                            <div id="arrow" data-popper-arrow></div>
                        </div>
                    <hr>
                </div>
                <div class="card card-primary card-outline"> 
                   {{--  <!DOCTYPE html>
                    <html lang="es"> --}}
                        <body>
                            <div id="model-stats" v-cloak>
                                {{--    <alert :message="alert.message"--}}
                                {{--           :type="alert.type"--}}
                                {{--           :auto-close="alert.autoClose"--}}
                                {{--           :confirmation-proceed="alert.confirmationProceed"--}}
                                {{--           :confirmation-cancel="alert.confirmationCancel"--}}
                                {{--           v-if="alert.type"></alert>--}}
                                
                                <div class="max-w-2xl mx-auto mb-5">
                                    <div class="flex items-center py-4">
                                        <h1 class="mb-0 ml-3 font-medium text-2xl">{{--ModelStats{{ config('app.name') ? ' - ' . config('app.name') : '' }}--}}</h1>
                                    </div>
                                    <div class="flex w-full mt-4 ">
                                        <div class="col-10">
                                            <router-view></router-view>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- Global ModelStats Object -->
                        </body>
                    {{-- </html> --}}
                    <div class="card-footer d-flex justify-content-center oculto-impresion">
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
        window.ModelStats = {
            config: @json($config),
            models: @json($models)
        }
    </script>
@stop

@section('js')
    <script src="{{ asset(mix('app.js', 'vendor/model-stats')) }}"></script>
@stop


